<?php

declare(strict_types=1);

namespace ArtishUp\Shopify\Store\Infrastructure\WebService\Shopify;

use GuzzleHttp\Client;

abstract class ShopifyRepositoryAbstract
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function submit($url, $method, $params = null)
    {
        try {
            switch ($method) {
                case 'GET':
                    $res = $this->client->get($url);
                    break;
                case 'POST':
                    $res = $this->client->post($url, ['json' => $params]);
                    break;
                case 'PUT':
                    $res = $this->client->put($url, ['json' => $params]);
                    break;
                case 'DELETE':
                    $res = $this->client->delete($url);
                    break;
            }

            $statusCode = $res->getStatusCode();

            $result = [
                'success' => $this->getStatus($statusCode),
                'code' => $statusCode,
                'response' => json_decode($res->getBody(), true)
            ];

            return $result;
        } catch (\Exception $e) {
            $statusCode = $e->getResponse()->getStatusCode();

            $result = [
                'success' => $this->getStatus($statusCode),
                'code' => $statusCode,
                'response' => json_decode($e->getResponse()->getBody(), true)
            ];

            return $result;
        }
    }

    public function getStatus($statusCode)
    {
        if ($statusCode == 200 || $statusCode == 201) {
            return true;
        }
        return false;
    }
}
