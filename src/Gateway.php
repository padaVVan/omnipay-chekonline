<?php

namespace Omnipay\Chekonline;

use Omnipay\Common\AbstractGateway;
use Omnipay\Chekonline\Message\ComplexRequest;

/**
 * Class Gateway
 * @package Omnipay\Chekonline
 * @method \Omnipay\Common\Message\NotificationInterface acceptNotification(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface authorize(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface capture(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface purchase(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface completePurchase(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface refund(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface fetchTransaction(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface void(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface createCard(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface updateCard(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface deleteCard(array $options = [])
 */
class Gateway extends AbstractGateway
{

    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     * @return string
     */
    public function getName()
    {
        return 'Chekonline';
    }

    /**
     * @param array $options
     *
     * @return ComplexRequest|\Omnipay\Common\Message\AbstractRequest
     */
    public function complex(array $options = [])
    {
        return $this->createRequest(ComplexRequest::class, $options);
    }

    /**
     * @return array
     */
    public function getDefaultParameters()
    {
        return [
            'Device' => 'auto',
            'NonCach' => [1000],
        ];
    }
}
