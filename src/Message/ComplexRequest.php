<?php

namespace Omnipay\Chekonline\Message;

use Money\Money;
use Omnipay\Common\ItemBag;
use Omnipay\Chekonline\ItemInterface;

/**
 * Class ComplexRequest
 * @property string Group
 * @property string Device
 * @property string RequestId
 * @property int Password
 * @property string ClientId
 * @property int DocumentType
 * @property ItemBag Lines
 * @property Money Cash
 * @property Money[] NonCash
 * @property Money AdvancePayment
 * @property Money Credit
 * @property Money Consideration
 * @property int TaxMode
 * @property string PhoneOrEmail
 * @property string Place
 * @property int PaymentAgentModes
 * @property array UserRequisite
 * @property int MaxDocumentsInTurn
 * @property boolean FullResponse
 *
 * @package Omnipay\Chekonline\Message
 */
class ComplexRequest extends AbstractRequest
{
    /**
     * @var array
     */
    protected $requiredFields = [
        'Device',
        'RequestId',
        'DocumentType',
        'Lines',
        'NonCash',
    ];

    /**
     * @return mixed
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
//        $this->validate(...$this->requiredFields);

        return array_merge(
            [],
//            $this->getAuthData(),
            [
                'Device' => $this->getDevice(),
                'RequestId' => $this->getRequestId(),
                'DocumentType' => $this->getDocumentType(),
                'Lines' => $this->getLinesAsArray(),
                'NonCash' => $this->getNonCash(),
            ]
        );
    }

    /**
     * Undocumented function
     *
     * @param [type] $fromContent
     * @return ComplexResponse
     */
    public function createResponse($fromContent)
    {
        return $this->response = new ComplexResponse($this, $fromContent);
    }

    /**
     * @return bool|string
     */
    protected function getEndpoint()
    {
        return parent::getEndpoint() . '/Complex';
    }

    /**
     * @return string
     */
    public function getGroup()
    {
        return $this->getParameter('Group');
    }

    /**
     * @param $value
     * @return self
     */
    public function setGroup($value)
    {
        return $this->setParameter('Group', $value);
    }

    /**
     * @return string
     */
    public function getDevice()
    {
        return $this->getParameter('Device');
    }

    /**
     * @param $value
     * @return ComplexRequest
     */
    public function setDevice($value)
    {
        return $this->setParameter('Device', $value);
    }

    /**
     * @return string
     */
    public function getRequestId()
    {
        return $this->getParameter('RequestId');
    }

    /**
     * @param $value
     * @return ComplexRequest
     */
    public function setRequestId($value)
    {
        return $this->setParameter('RequestId', $value);
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->getParameter('Password');
    }

    /**
     * @param $value
     * @return ComplexRequest
     */
    public function setPassword($value)
    {
        return $this->setParameter('Password', $value);
    }

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->getParameter('ClientId');
    }

    /**
     * @param $value
     * @return ComplexRequest
     */
    public function setClientId($value)
    {
        return $this->setParameter('ClientId', $value);
    }

    /**
     * @return string
     */
    public function getDocumentType()
    {
        return $this->getParameter('DocumentType');
    }

    /**
     * @param $value
     * @return ComplexRequest
     */
    public function setDocumentType($value)
    {
        return $this->setParameter('DocumentType', $value);
    }

    /**
     * @return array
     */
    public function getLines()
    {
        return $this->getParameter('Lines');
    }

    /**
     * @param array $items
     * @return ComplexRequest
     */
    public function setLines(array $items)
    {
        if ($items && !$items instanceof ItemBag) {
            $items = new ItemBag($items);
        }

        return $this->setParameter('Lines', $items);
    }

    /**
     * @return string
     */
    public function getCash()
    {
        return $this->getParameter('Cash');
    }

    /**
     * @param $value
     * @return ComplexRequest
     */
    public function setCash($value)
    {
        return $this->setParameter('Cash', $value);
    }

    /**
     * @return string
     */
    public function getNonCash()
    {
        return $this->getParameter('NonCash');
    }

    /**
     * @param $value
     * @return ComplexRequest
     */
    public function setNonCash($value)
    {
        return $this->setParameter('NonCash', $value);
    }

    /**
     * @return string
     */
    public function getAdvancePayment()
    {
        return $this->getParameter('AdvancePayment');
    }

    /**
     * @param $value
     * @return ComplexRequest
     */
    public function setAdvancePayment($value)
    {
        return $this->setParameter('AdvancePayment', $value);
    }

    /**
     * @return string
     */
    public function getCredit()
    {
        return $this->getParameter('Credit');
    }

    /**
     * @param $value
     * @return ComplexRequest
     */
    public function setCredit($value)
    {
        return $this->setParameter('Credit', $value);
    }

    /**
     * @return string
     */
    public function getConsideration()
    {
        return $this->getParameter('Consideration');
    }

    /**
     * @param $value
     * @return ComplexRequest
     */
    public function setConsideration($value)
    {
        return $this->setParameter('Consideration', $value);
    }

    /**
     * @return string
     */
    public function getTaxMode()
    {
        return $this->getParameter('TaxMode');
    }

    /**
     * @param $value
     * @return ComplexRequest
     */
    public function setTaxMode($value)
    {
        return $this->setParameter('TaxMode', $value);
    }

    /**
     * @return string
     */
    public function getPhoneOrEmail()
    {
        return $this->getParameter('PhoneOrEmail');
    }

    /**
     * @param $value
     * @return ComplexRequest
     */
    public function setPhoneOrEmail($value)
    {
        return $this->setParameter('PhoneOrEmail', $value);
    }

    /**
     * @return string
     */
    public function getPlace()
    {
        return $this->getParameter('Place');
    }

    /**
     * @param $value
     * @return ComplexRequest
     */
    public function setPlace($value)
    {
        return $this->setParameter('Place', $value);
    }

    /**
     * @return string
     */
    public function getPaymentAgentModes()
    {
        return $this->getParameter('PaymentAgentModes');
    }

    /**
     * @param $value
     * @return ComplexRequest
     */
    public function setPaymentAgentModes($value)
    {
        return $this->setParameter('PaymentAgentModes', $value);
    }

    /**
     * @return string
     */
    public function getUserRequisite()
    {
        return $this->getParameter('UserRequisite');
    }

    /**
     * @param $value
     * @return ComplexRequest
     */
    public function setUserRequisite($value)
    {
        return $this->setParameter('UserRequisite', $value);
    }

    /**
     * @return string
     */
    public function getMaxDocumentsInTurn()
    {
        return $this->getParameter('MaxDocumentsInTurn');
    }

    /**
     * @param $value
     * @return ComplexRequest
     */
    public function setMaxDocumentsInTurn($value)
    {
        return $this->setParameter('MaxDocumentsInTurn', $value);
    }

    /**
     * @return string
     */
    public function getFullResponse()
    {
        return $this->getParameter('FullResponse');
    }

    /**
     * @param $value
     * @return ComplexRequest
     */
    public function setFullResponse($value)
    {
        return $this->setParameter('FullResponse', $value);
    }

    /**
     * @return array
     */
    public function getLinesAsArray()
    {
        /** @var ItemBag|array $lines */
        $lines = $this->getLines();

        return array_map(
            function ($item) {
                /** @var ItemInterface $item */
                return $item->toArray();
            },
            $lines instanceof ItemBag
                ? iterator_to_array($lines->getIterator())
                : $lines
        );
    }
}