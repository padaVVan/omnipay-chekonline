<?php

namespace Omnipay\Chekonline\Message;

/**
 * Class AbstractRequest
 * @package Omnipay\Chekonline\Message
 */
abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    /**
     * Адрес тестового сервера
     * @var string
     */
    protected $testEndpoint = 'https://fce.chekonline.ru:4443/fr/api/v2';

    /**
     * Адрес боевого сервера
     * @var string
     */
    protected $prodEndpoint = 'https://fce.chekonline.ru:4443/fr/api/v2';

    /**
     * @return string
     */
    public function getHttpMethod()
    {
        return 'POST';
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return [
            'Content-type' => 'application/json"',
        ];
    }

    /**
     * Send the request with specified data
     *
     * @param  array $data The data to send
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function sendData($data)
    {
        $httpResponse = $this->httpClient->request(
            $this->getHttpMethod(),
            $this->getEndpoint(),
            $this->getHeaders(),
            json_encode($data)
        );
        $contents = $httpResponse->getBody()->getContents();

        $contents = json_decode($contents, true);
        return $this->response = $this->createResponse($contents);
    }

    /**
     * Undocumented function
     *
     * @param [type] $fromContent
     * @return \Psr\Http\Message\ResponseInterface
     */
    abstract public function createResponse($fromContent);

    /**
     * @return bool
     */
    protected function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->prodEndpoint;
    }
}
