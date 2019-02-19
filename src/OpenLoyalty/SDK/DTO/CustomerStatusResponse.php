<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\DTO;

use OpenLoyalty\SDK\Model\CustomerId;

/**
 * Class CustomerStatusResponse
 * @package OpenLoyalty\SDK\DTO
 */
class CustomerStatusResponse
{
    /**
     * @var CustomerId
     */
    private $customerId;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var float
     */
    private $points;

    /**
     * @var float
     */
    private $usedPoints;

    /**
     * @var float
     */
    private $expiredPoints;

    /**
     * @var string
     */
    private $level;

    /**
     * @var string
     */
    private $levelName;

    /**
     * @var string
     */
    private $nextLevelName;

    /**
     * @var int
     */
    private $transactionsAmountWithoutDeliveryCosts;

    /**
     * @var int
     */
    private $transactionsAmountToNextLevel;

    /**
     * @var float
     */
    private $averageTransactionsAmount;

    /**
     * @var int
     */
    private $transactionsCount;

    /**
     * @var int
     */
    private $transactionsAmount;

    /**
     * @var string
     */
    private $currency;

    /**
     * @return CustomerId
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param $customerId
     * @throws \Assert\AssertionFailedException
     */
    public function setCustomerId($customerId)
    {
        if (is_string($customerId)) {
            $customerId = new CustomerId($customerId);
        } elseif (!$customerId instanceof CustomerId) {
            throw new \InvalidArgumentException('Invalid customerId');
        }
        $this->customerId = $customerId;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return float
     */
    public function getUsedPoints()
    {
        return $this->usedPoints;
    }

    /**
     * @param float $usedPoints
     */
    public function setUsedPoints($usedPoints)
    {
        $this->usedPoints = floatval($usedPoints);
    }

    /**
     * @return float
     */
    public function getExpiredPoints()
    {
        return $this->expiredPoints;
    }

    /**
     * @param float $expiredPoints
     */
    public function setExpiredPoints($expiredPoints)
    {
        $this->expiredPoints = floatval($expiredPoints);
    }

    /**
     * @return string
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param string $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return string
     */
    public function getLevelName()
    {
        return $this->levelName;
    }

    /**
     * @param string $levelName
     */
    public function setLevelName($levelName)
    {
        $this->levelName = $levelName;
    }

    /**
     * @return string
     */
    public function getNextLevelName()
    {
        return $this->nextLevelName;
    }

    /**
     * @param string $nextLevelName
     */
    public function setNextLevelName($nextLevelName)
    {
        $this->nextLevelName = $nextLevelName;
    }

    /**
     * @return int
     */
    public function getTransactionsAmountWithoutDeliveryCosts()
    {
        return $this->transactionsAmountWithoutDeliveryCosts;
    }

    /**
     * @param int $transactionsAmountWithoutDeliveryCosts
     */
    public function setTransactionsAmountWithoutDeliveryCosts($transactionsAmountWithoutDeliveryCosts)
    {
        $this->transactionsAmountWithoutDeliveryCosts = intval($transactionsAmountWithoutDeliveryCosts);
    }

    /**
     * @return int
     */
    public function getTransactionsAmountToNextLevel()
    {
        return $this->transactionsAmountToNextLevel;
    }

    /**
     * @param int $transactionsAmountToNextLevel
     */
    public function setTransactionsAmountToNextLevel($transactionsAmountToNextLevel)
    {
        $this->transactionsAmountToNextLevel = intval($transactionsAmountToNextLevel);
    }

    /**
     * @return float
     */
    public function getAverageTransactionsAmount()
    {
        return $this->averageTransactionsAmount;
    }

    /**
     * @param float $averageTransactionsAmount
     */
    public function setAverageTransactionsAmount($averageTransactionsAmount)
    {
        $this->averageTransactionsAmount = floatval($averageTransactionsAmount);
    }

    /**
     * @return int
     */
    public function getTransactionsCount()
    {
        return $this->transactionsCount;
    }

    /**
     * @param int $transactionsCount
     */
    public function setTransactionsCount($transactionsCount)
    {
        $this->transactionsCount = intval($transactionsCount);
    }

    /**
     * @return int
     */
    public function getTransactionsAmount()
    {
        return $this->transactionsAmount;
    }

    /**
     * @param int $transactionsAmount
     */
    public function setTransactionsAmount($transactionsAmount)
    {
        $this->transactionsAmount = intval($transactionsAmount);
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency)
    {
        $this->currency = $currency;
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
