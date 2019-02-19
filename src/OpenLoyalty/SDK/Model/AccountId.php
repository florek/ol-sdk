<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */
namespace OpenLoyalty\SDK\Model;

use Assert\Assertion as Assert;

/**
 * Class AccountId
 * @package OpenLoyalty\SDK\Model
 */
class AccountId
{
    /**
     * @var string
     */
    private $accountId;

    /**
     * AccountId constructor.
     * @param $accountId
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($accountId)
    {
        Assert::string($accountId);
        Assert::uuid($accountId);

        $this->accountId = $accountId;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->accountId;
    }
}
