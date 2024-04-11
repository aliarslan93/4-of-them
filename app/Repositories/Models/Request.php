<?php

namespace App\Repositories\Models;

use GuzzleHttp\Client;

class Request
{

    protected $client;
    protected $base_url;
    protected $authorization;
    protected $options = [];
    protected array $headers = [];
    public function __construct()
    {
        $this->client = new Client(
            ['base_uri'        => $this->base_url, []]
        );
    }

    /**
     * @param string $endpoint
     * @param bool|array $data
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function getAsync(string $endpoint, array $data = [])
    {
        $this->setDefaultHeaders();
        return $this->client->getAsync($endpoint, [
            'query' => $data,
            'headers' => $this->headers
        ]);
    }
    /**
     * @param string $endpoint
     * @param bool|array $data
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function get(string $endpoint, array $data = [], $test = false)
    {
        $this->setDefaultHeaders();
        return $this->client->get($endpoint, [
            'query' => $data,
            'headers' => $this->headers
        ]);;
    }

    protected function delete($endpoint)
    {
        $this->setDefaultHeaders();
        $this->addHeader('accept', "*/*");

        return $this->client->delete($endpoint, [
            'headers' => $this->headers
        ]);
    }

    protected function post(string $endpoint, bool|array $data = false)
    {
        $this->setDefaultHeaders();
        $this->addHeader("Content-Type", "application/json");
        $this->addHeader('accept', "application/json");
        try {
            return $this->client->post($endpoint, [
                'body' => json_encode($data),
                'headers' => $this->headers,
            ]);
        } catch (\Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    protected function postAsync(string $endpoint, bool|array $data = false)
    {
        $this->setDefaultHeaders();

        return $this->client->postAsync($endpoint, [
            'form_params' => $data,
            'headers' => $this->headers,
        ]);
    }

    private function setDefaultHeaders(): void
    {
        $this->headers = array_merge($this->headers, [
            //'X-BarrierToken' => 'XXXXX',
            "accept" => "application/json",
            "Authorization" => $this->authorization,


        ]);
    }

    protected function addHeader(string $key, string $value): self
    {
        $this->headers[$key] = $value;

        return $this;
    }
    public function response($response, $decode = false, $object = false)
    {
        if ($decode) {
            return json_decode($response->getBody()->getContents(), $object);
        }
        return $response->getBody()->getContents();
    }
}
