<?php
declare(strict_types=1);

namespace Demo\Api;

class Client extends \GuzzleHttp\Client
{
    private $baseApiUrl;
    private $jwtToken;

    protected $config = [];

    public function __construct(
        string $baseApiUrl,
        string $jwtToken
    ) {
        parent::__construct();
        $this->baseApiUrl = rtrim($baseApiUrl, '/');
        $this->jwtToken = $jwtToken;
    }

    // todo tests
    public function executeAction(Action $action)
    {
        try {
            $response = $this->request(
                $action->method(),
                sprintf('%s/%s', $this->baseApiUrl, ltrim($action->path())),
                [
                    'headers' => $this->prepareHeaders(),
                    'body' => $action->payload(),
                ]
            );
        } catch (\Throwable $exception) {
            // todo
        }
        
        return $action->handleResponse($response);
    }

    private function prepareHeaders()
    {
        return [
            'Content-Type' =>  'application/json',
            'Authorization' => sprintf('Bearer %s', $this->jwtToken),
        ];
    }
}
