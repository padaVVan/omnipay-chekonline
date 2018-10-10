<?php

namespace Omnipay\Chekonline;

/**
 * Interface ItemInterface
 * @package Omnipay\Chekonline
 */
interface ItemInterface extends \Omnipay\Common\ItemInterface
{
    /**
     * @return integer
     */
    public function getTax();

    /**
     * @return array
     */
    public function toArray();
}