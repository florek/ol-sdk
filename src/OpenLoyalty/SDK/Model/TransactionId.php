<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */
namespace OpenLoyalty\SDK\Model;

use Assert\Assertion as Assert;

/**
 * Class TransactionId
 * @package OpenLoyalty\SDK\Model
 */
class TransactionId
{
    private $transactionId;

    /**
     * transactionId constructor.
     * @param $transactionId
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($transactionId)
    {
        Assert::string($transactionId);
        Assert::uuid($transactionId);

        $this->transactionId = $transactionId;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->transactionId;
    }
}
