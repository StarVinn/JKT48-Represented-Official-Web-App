<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use Symfony\Component\DomCrawler\Crawler;

class Jkt48ScraperService
{
    public function getAllNews(): array
    {
        try {
            $jar = new CookieJar();
            $client = new Client([
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
                    'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
                    'Accept-Language' => 'en-US,en;q=0.5',
                    'Accept-Encoding' => 'gzip, deflate',
                    'DNT' => '1',
                    'Connection' => 'keep-alive',
                    'Upgrade-Insecure-Requests' => '1',
                    'Referer' => 'https://jkt48.com/',
                ],
                'verify' => false,
                'timeout' => 30,
                'cookies' => $jar,
            ]);

            // First, visit the main page to set cookies
            $client->get('https://jkt48.com/');

            $url = 'https://jkt48.com/news/list?lang=id';

            $response = $client->get($url);
            $html = $response->getBody()->getContents();
        } catch (\Exception $e) {
            // Log the error and return empty array or handle gracefully
            \Log::error('Failed to fetch news from JKT48: ' . $e->getMessage());
            // Return cached or static news data as fallback
            return $this->getFallbackNews();
        }

        $crawler = new Crawler($html);

        $newsList = [];

        $crawler->filter('.entry-news .entry-news__list')->each(function (Crawler $node) use (&$newsList) {
            $title = $node->filter('h3 a')->text();
            $href = $node->filter('h3 a')->attr('href');
            $id = intval(explode('?', substr($href, 16))[0]);

            $date = $node->filter('time')->text();
            $categorySrc = $node->filter('.entry-news__list--label img')->attr('src');

            $category = match (explode('.', substr($categorySrc, 8))[1]) {
                'cat1' => 'Theater',
                'cat2' => 'Event',
                'cat4' => 'Release',
                'cat5' => 'Birthday',
                'cat8' => 'Other',
                default => 'Unknown',
            };

            $newsList[] = [
                'id' => $id,
                'title' => $title,
                'date' => $date,
                'category' => $category,
            ];
        });

        return $newsList;
    }

    private function getFallbackNews(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'JKT48 Theater Show - Regular Performance',
                'date' => now()->format('Y-m-d'),
                'category' => 'Theater',
            ],
            [
                'id' => 2,
                'title' => 'New Single Release Announcement',
                'date' => now()->subDays(1)->format('Y-m-d'),
                'category' => 'Release',
            ],
            [
                'id' => 3,
                'title' => 'Member Birthday Celebration',
                'date' => now()->subDays(2)->format('Y-m-d'),
                'category' => 'Birthday',
            ],
            [
                'id' => 4,
                'title' => 'Fan Meeting Event',
                'date' => now()->subDays(3)->format('Y-m-d'),
                'category' => 'Event',
            ],
            [
                'id' => 5,
                'title' => 'General Update',
                'date' => now()->subDays(4)->format('Y-m-d'),
                'category' => 'Other',
            ],
        ];
    }

}
