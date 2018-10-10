<?php

namespace Omnipay\Chekonline\enum;

/**
 * Типы документов
 *
 * @package Omnipay\Chekonline\enum
 */
class DocumentType
{
    /**
     * Приход
     */
    const CREDIT = 0;

    /**
     * Расход
     */
    const DEBIT = 1;

    /**
     * Возврат прихода
     */
    const RETURN_CREDIT = 2;

    /**
     * Возврат расхода
     */
    const RETURN_DEBIT = 3;
}
