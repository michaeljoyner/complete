<?php
/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 1/5/16
 * Time: 2:31 PM
 */

namespace App\Importing;


use GuzzleHttp\Client;

class PageFetcher
{

    /**
     * @var Client
     */
    private $http;

    private $baseUrl = 'http://completeliving.co.za/read_article.php?article_id=';

    public function __construct(Client $http)
    {
        $this->http = $http;
    }

    public function fetchArticle($id)
    {
        $response = $this->http->get($this->baseUrl.$id);

        return $response->getBody()->getContents();
    }

}