<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */
namespace OpenLoyalty\SDK\Model;

use Assert\Assertion as Assert;

/**
 * Class PointsTransferId
 * @package OpenLoyalty\SDK\Model
 */
class PointsTransferId
{
    /**
     * @var string
     */
    private $pointsTransferId;

    /**
     * PointsTransferId constructor.
     * @param $pointsTransferId
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($pointsTransferId)
    {
        Assert::string($pointsTransferId);
        Assert::uuid($pointsTransferId);

        $this->pointsTransferId = $pointsTransferId;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->pointsTransferId;
    }
}
