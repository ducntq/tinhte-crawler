<?php

namespace app\commands;


use app\models\Article;
use app\models\Link;
use Symfony\Component\DomCrawler\Crawler;
use yii\console\Controller;
use yii\httpclient\Client;

class ScrapeController extends Controller
{
    public function actionIndex()
    {
        $i = 0;
        $urlFormat = 'https://tinhte.vn/?wpage=%d';
        $client = new Client();
        $baseUri = 'http://tinhte.vn/';

        while (true) {
            $i++;
            echo 'Page: ' . $i . "\n";
            $scraped = 0;
            $url = sprintf($urlFormat, $i);

            $response = $client->get($url)->send();

            if (!$response->isOk) break;

            $html = $response->getContent();

            $crawler = new Crawler($html);
            $crawler = $crawler->filter('.newsTitle');
            foreach ($crawler as $domElement) {
                $scraped++;
                $link = new Article();
                $link->title = $domElement->textContent;
                $link->url = (string)$baseUri . $domElement->getAttribute('href');

                echo 'Scraping: ' . $link->url . "\n";

                $detailsResp = $client->get($link->url)->send();

                if (!$detailsResp->isOk) continue;

                $detailsHtml = $detailsResp->getContent();
                $detailsCrawler = new Crawler($detailsHtml);

                $detailsCrawler = $detailsCrawler->filter('#messageList li:first-child article blockquote');

                $link->content = $detailsCrawler->first()->html();

                try {
                    $link->save();
                } catch (\Exception $e) {
                    echo 'Error: ' . $e->getMessage() . "\n";
                }
            }

            if ($scraped == 0) break;
        }

        echo "Done\n\n";
    }
}