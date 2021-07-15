<?php
/**
 * Created by PhpStorm.
 * User: haqury
 * Date: 15.07.21
 * Time: 19:10
 */

namespace App\services;


use App\Models\RpcResponse;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class RPC
{
    const JSON_RPC_VERSION = '2.0';

    const METHOD_URI = 'http://127.0.0.1:8001/data/json-rpc';

    /** @var Client  */
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'X-Tochka-Access-Key' => 'TOKEN',
            ],
            'base_uri' => config('services.data.base_uri')
        ]);
    }

    public function send(string $method, array $params)
    {
        $response = $this->client
            ->post(self::METHOD_URI, [
                RequestOptions::JSON => [
                    'jsonrpc' => self::JSON_RPC_VERSION,
                    'id' => time(),
                    'method' => $method,
                    'params' => $params
                ]
            ])->getBody()->getContents();

        return new RpcResponse($response);
    }
}
