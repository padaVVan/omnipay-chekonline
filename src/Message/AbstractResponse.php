<?php

namespace Omnipay\Chekonline\Message;

/**
 * Class AbstractResponse
 * @package Omnipay\Chekonline\Message
 */
abstract class AbstractResponse extends \Omnipay\Common\Message\AbstractResponse
{
    /**
     * Response Message
     *
     * @return null|string A response message from the payment gateway
     */
    public function getMessage()
    {
        return $this->isFatal()
            ? $this->getCloudError()
            : $this->getDeviceError();
    }

    /**
     * Response code
     *
     * @return null|string A response code from the payment gateway
     */
    public function getCode()
    {
        return $this->isFatal()
            ? $this->getData()['FCEError']
            : $this->getData()['Response']['Error'];
    }

    /**
     * @return bool
     */
    public function isFatal()
    {
        return array_key_exists('Fatal', $this->getData());
    }

    /**
     * @return string
     */
    public function getCloudError()
    {
        return array_key_exists('ErrorDescription', $this->getData())
            ? $this->getData()['ErrorDescription']
            : '';
    }

    /**
     * @return string
     */
    public function getDeviceError()
    {
        $data = $this->getData();
        $hasMessage = array_key_exists('ErrorMessages', $data['Response']);

        return $hasMessage
            ? $data['Response']['ErrorMessages']
            : '';
    }
}
