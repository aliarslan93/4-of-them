<?php

namespace App\Repositories\Models;

use GuzzleHttp\Client;

class Request
{

    const BASE_URL = 'https://candidate-testing.api.royal-apps.io/api/v2/';
    const Authorization = "d8b8c6ad19ec6bc8e8c6faf180d2cc3bfd79dffb9d91602c15ffff85ab38c185effd4520670cd7af";
    protected $client;
    protected $options = [];
    protected array $headers = [];
    public function __construct()
    {
        $this->client = new Client(
            ['base_uri'        => self::BASE_URL, []]
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
        ]);
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
            "Authorization" => self::Authorization,


        ]);
    }

    protected function addHeader(string $key, string $value): self
    {
        $this->headers[$key] = $value;

        return $this;
    }
}
