<?php

namespace Omnipay\Chekonline;

use Omnipay\Common\Helper;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class Item
 * @package Omnipay\Chekonline
 */
class Item implements ItemInterface
{
    /**
     * @var \Symfony\Component\HttpFoundation\ParameterBag
     */
    protected $parameters;

    /**
     * Create a new item with the specified parameters
     *
     * @param array|null $parameters An array of parameters to set on the new object
     */
    public function __construct(array $parameters = null)
    {
        $this->initialize($parameters);
    }

    /**
     * Initialize this item with the specified parameters
     *
     * @param array|null $parameters An array of parameters to set on this object
     * @return $this Item
     */
    public function initialize(array $parameters = null)
    {
        $this->parameters = new ParameterBag;

        Helper::initialize($this, $parameters);

        return $this;
    }

    /**
     * Name of the item
     */
    public function getName()
    {
        return '';
    }

    /**
     * Description of the item
     * @param $text
     * @return Item
     */
    public function setDescription($text)
    {
        return $this->setParameter('Description', $text);
    }

    /**
     * Description of the item
     */
    public function getDescription()
    {
        return $this->getParameter('Description');
    }

    /**
     * Description of the item
     * @param $number
     * @return Item
     */
    public function setQuantity($number)
    {
        return $this->setParameter('Qty', $number);
    }

    /**
     * Quantity of the item
     */
    public function getQuantity()
    {
        return $this->getParameter('Qty');
    }

    /**
     * Description of the item
     * @param $type
     * @return Item
     */
    public function setTax($type)
    {
        return $this->setParameter('TaxId', $type);
    }

    /**
     * @return integer
     */
    public function getTax()
    {
        return $this->getParameter('TaxId');
    }

    /**
     * Price of the item
     * @param $amount
     * @return Item
     */
    public function setPrice($amount)
    {
        return $this->setParameter('Price', $amount);
    }

    /**
     * Price of the item
     */
    public function getPrice()
    {
        return $this->getParameter('Price');
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'Description' => $this->getDescription(),
            'Qty' => $this->getQuantity(),
            'TaxId' => $this->getTax(),
            'Price' => $this->getPrice(),
            'PayAttribute' => 4
        ];
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters->all();
    }

    /**
     * @param  string $key
     * @return mixed
     */
    public function getParameter($key)
    {
        return $this->parameters->get($key);
    }

    /**
     * @param  string $key
     * @param  mixed  $value
     * @return $this
     */
    public function setParameter($key, $value)
    {
        $this->parameters->set($key, $value);

        return $this;
    }
}
