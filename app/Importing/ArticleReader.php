<?php
/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 1/5/16
 * Time: 9:46 PM
 */

namespace App\Importing;


use Symfony\Component\DomCrawler\Crawler;

class ArticleReader
{

    /**
     * @var PageFetcher
     */
    private $pageFetcher;
    /**
     * @var Crawler
     */
    private $crawler;

    public function __construct(PageFetcher $pageFetcher, Crawler $crawler)
    {
        $this->pageFetcher = $pageFetcher;
        $this->crawler = $crawler;
    }

    public function getPage($id)
    {
        $this->crawler = new Crawler();
        $this->crawler->addHtmlContent($this->pageFetcher->fetchArticle($id));

        return $this;
    }

    public function getHeading()
    {
        return ucwords(strtolower($this->crawler->filter('.art_headline')->text()));
    }

    public function getSubHeading()
    {
        return ucfirst(strtolower($this->crawler->filter('.art_headline')->text()));
    }

    public function getPublishedDate()
    {
        $date_text = $this->crawler->filter('.art_post_date')->text();
        preg_match('/([\d]{1,2}[st|nd|rd|th]{2} [a-zA-Z]{3} [\d]{4})/', $date_text, $matches);
        $date_string = $matches[0];

        $date = new \DateTime($date_string);

        return $date->format('Y-m-d');
    }

    public function getBody()
    {
        return str_replace('src="images', 'src="/images', $this->crawler->filter('.art_body')->html());
    }

    public function getLeadImage()
    {
        $imageHtml = $this->crawler->filter('#read_article_wrapper > .art_pic_wrapper');

        if ($imageHtml->count() < 1) {
            $imageHtml = $this->crawler->filter('#read_article_wrapper > .art_pic_wrapper_big');
        }

        if ($imageHtml->count() < 1) {
            return '';
        }

        return str_replace('src="images', 'src="/images', $imageHtml->html());
    }
}