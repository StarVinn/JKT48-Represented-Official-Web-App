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
        "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120 Safari/537.36"
    );

    await page.goto("https://jkt48.com/news/list?lang=id", {
        waitUntil: "networkidle2",
    });

    const news = await page.evaluate(() => {
        let items = [];

        document
            .querySelectorAll(".entry-news .entry-news__list")
            .forEach((item) => {
                const title = item.querySelector("h3 a")?.innerText.trim();
                const href = item.querySelector("h3 a")?.getAttribute("href");
                const date = item.querySelector("time")?.innerText.trim();

                const img = item.querySelector(".entry-news__list--label img");
                let category = "Unknown";

                if (img) {
                    const src = img.getAttribute("src"); // gunakan getAttribute
                    const file = src.split("/").pop(); // "icon.cat2.png"
                    const parts = file.split("."); // ["icon", "cat2", "png"]
                    const cat = parts.length >= 2 ? parts[1] : null;

                    category =
                        {
                            cat1: "Theater",
                            cat2: "Event",
                            cat4: "Release",
                            cat5: "Birthday",
                            cat8: "Other",
                        }[cat] || "Unknown";
                }

                const idMatch = href.match(/\/news\/detail\/id\/(\d+)/);
                const id = idMatch ? parseInt(idMatch[1]) : null;

                if (id) {
                    items.push({
                        id,
                        title,
                        date,
                        category,
                        url: "https://jkt48.com" + href,
                    });
                }
            });

        return items;
    });

    console.log(JSON.stringify(news, null, 2));

    await browser.close();
})();
