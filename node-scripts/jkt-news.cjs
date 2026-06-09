const puppeteer = require("puppeteer");

(async () => {
    const browser = await puppeteer.launch({
        headless: "new",
        args: [
            "--no-sandbox",
            "--disable-setuid-sandbox",
            "--disable-gpu",
            "--disable-dev-shm-usage",
        ],
    });

    const page = await browser.newPage();

    await page.setUserAgent(
        "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120 Safari/537.36",
    );

    await page.goto("https://jkt48.com/news/list?lang=id&page=1", {
        waitUntil: "networkidle2",
    });

    const news = await page.evaluate(() => {
        const items = [];

        // Find anchors that point to news pages. Be permissive: some pages use
        // slug-style URLs (e.g. /news/some-title) while older pages may use
        // /news/detail/id/123. We try several fallbacks to extract title, date,
        // category and an identifier.
        const anchors = Array.from(
            document.querySelectorAll('a[href^="/news/"]'),
        );

        const seen = new Set();

        anchors.forEach((a) => {
            const href = a.getAttribute("href");
            if (!href) return;

            // normalize url
            const url = href.startsWith("http")
                ? href
                : location.origin + (href.startsWith("/") ? href : "/" + href);
            if (seen.has(url)) return;
            seen.add(url);

            // title: prefer heading inside anchor, otherwise the anchor text
            let title = a
                .querySelector("h1, h2, h3, .title, .entry-title")
                ?.innerText?.trim();
            if (!title) {
                title = a.innerText
                    .split("\n")
                    .map((s) => s.trim())
                    .filter(Boolean)
                    .slice(0, 2)
                    .join(" - ")
                    .trim();
            }

            // date: look for time element nearby (inside anchor, parent or sibling)
            let date = a.querySelector("time")?.innerText?.trim();
            if (!date) {
                const timeEl =
                    a.closest("li")?.querySelector("time") ||
                    a.parentElement?.querySelector("time") ||
                    a.nextElementSibling?.querySelector("time");
                date = timeEl?.innerText?.trim() || null;
            }

            // category: try to find an icon image or a class naming the category
            let category = "Unknown";
            const img =
                a.querySelector("img") || a.parentElement?.querySelector("img");
            if (img) {
                const src = img.getAttribute("src") || "";
                const file = src.split("/").pop() || "";
                const parts = file.split(".");
                const cat = parts.length >= 2 ? parts[1] : null;
                category =
                    {
                        cat1: "Theater",
                        cat2: "Event",
                        cat4: "Release",
                        cat5: "Birthday",
                        cat8: "Other",
                    }[cat] || "Unknown";
            } else {
                // try class names containing 'cat' or 'category'
                const cls =
                    (a.className || "") +
                    " " +
                    (a.parentElement?.className || "");
                const m = cls.match(/cat(\d+)/i);
                if (m) {
                    const map = {
                        1: "Theater",
                        2: "Event",
                        4: "Release",
                        5: "Birthday",
                        8: "Other",
                    };
                    category = map[m[1]] || "Unknown";
                }
            }

            // id: prefer numeric id in older detail URLs, otherwise use slug
            let id = null;
            const idMatch = href.match(/\/news\/detail\/id\/(\d+)/);
            if (idMatch) id = parseInt(idMatch[1], 10);
            else {
                const parts = href.split("/").filter(Boolean);
                const slug = parts.length ? parts[parts.length - 1] : null;
                id = slug || null;
            }

            items.push({
                id,
                title: title || null,
                date: date || null,
                category,
                url,
            });
        });

        return items;
    });

    console.log(JSON.stringify(news, null, 2));

    await browser.close();
})();
