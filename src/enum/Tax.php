<?php

namespace Omnipay\Chekonline\enum;

/**
 * Class Tax
 * @package Omnipay\Chekonline\enum
 */
class Tax
{
    /**
     * НДС 18%
     */
    const NDS_18 = 1;

    /**
     * НДС 10%
     */
    const NDS_10 = 2;

    /**
     * НДС 0%
     */
    const NDS_0 = 3;

    /**
     * Без налога
     */
    const ZERO_RATE = 4;

    /**
     * Ставка 18/118
     */
    const RATE_18_118 = 5;

    /**
     * Ставка 10/110
     */
    const RATE_10_110 = 6;
}
