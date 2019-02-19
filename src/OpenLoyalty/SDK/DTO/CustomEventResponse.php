<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\DTO;

/**
 * Class CustomEventResponse
 * @package OpenLoyalty\SDK\DTO
 */
class CustomEventResponse
{
    /**
     * @var float
     */
    protected $points;

    /**
     * TransactionSimulateResponse constructor.
     * @param float $points
     */
    public function __construct($points)
    {
        $this->setPoints($points);
    }

    /**
     * @return float
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param float $points
     */
    public function setPoints($points)
    {
        $this->points = floatval($points);
    }
}
