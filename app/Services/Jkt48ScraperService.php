<?php

namespace App\Services;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class Jkt48ScraperService
{
    public function getAllNews(): array
    {
        $client = new Client();
        $url = 'https://jkt48.com/news/list?lang=id';

        $response = $client->get($url);
        $html = $response->getBody()->getContents();

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

}
