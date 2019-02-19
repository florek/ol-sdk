<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */
namespace OpenLoyalty\SDK\Model;

use Assert\Assertion as Assert;

/**
 * Class PosId
 * @package OpenLoyalty\SDK\Model
 */
class PosId
{
    private $posId;

    /**
     * posId constructor.
     * @param $posId
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($posId)
    {
        Assert::string($posId);
        Assert::uuid($posId);

        $this->posId = $posId;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->posId;
    }
}
