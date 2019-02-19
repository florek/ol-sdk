<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Model;

use DateTime;

/**
 * Class PointsTransfer
 * @package OpenLoyalty\SDK\Model
 */
class PointsTransfer
{
    /**
     * @var PointsTransferId
     */
    private $pointsTransferId;

    /**
     * @var AccountId
     */
    private $accountId;

    /**
     * @var CustomerId
     */
    private $customerId;

    /**
     * @var string
     */
    private $customerFirstName;

    /**
     * @var string
     */
    private $customerLastName;

    /**
     * @var string
     */
    private $customerLoyaltyCardNumber;

    /**
     * @var string
     */
    private $customerEmail;

    /**
     * @var string
     */
    private $customerPhone;

    /**
     * @var float
     */
    private $value;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var string
     */
    private $issuer;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $expireAt;

    /**
     * @return PointsTransferId
     */
    public function getPointsTransferId()
    {
        return $this->pointsTransferId;
    }

    /**
     * @param string|PointsTransferId $pointsTransferId
     * @throws \Assert\AssertionFailedException
     */
    public function setPointsTransferId($pointsTransferId)
    {
        if (is_string($pointsTransferId)) {
            $pointsTransferId = new PointsTransferId($pointsTransferId);
        } elseif (!$pointsTransferId instanceof PointsTransferId) {
            throw new \InvalidArgumentException(
                'Invalid param pointsTransferId'
            );
        }
        $this->pointsTransferId = $pointsTransferId;
    }

    /**
     * @return AccountId
     */
    public function getAccountId(): AccountId
    {
        return $this->accountId;
    }

    /**
     * @param string|AccountId $accountId
     * @throws \Assert\AssertionFailedException
     */
    public function setAccountId($accountId)
    {
        if (is_string($accountId)) {
            $accountId = new AccountId($accountId);
        } elseif (!$accountId instanceof AccountId) {
            throw new \InvalidArgumentException(
                'Invalid param accountId'
            );
        }
        $this->accountId = $accountId;
    }

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
            throw new \InvalidArgumentException(
                'Invalid param customerId'
            );
        }

        $this->customerId = $customerId;
    }

    /**
     * @return string
     */
    public function getCustomerFirstName()
    {
        return $this->customerFirstName;
    }

    /**
     * @param string $customerFirstName
     */
    public function setCustomerFirstName($customerFirstName)
    {
        $this->customerFirstName = $customerFirstName;
    }

    /**
     * @return string
     */
    public function getCustomerLastName()
    {
        return $this->customerLastName;
    }

    /**
     * @param string $customerLastName
     */
    public function setCustomerLastName($customerLastName)
    {
        $this->customerLastName = $customerLastName;
    }

    /**
     * @return string
     */
    public function getCustomerLoyaltyCardNumber()
    {
        return $this->customerLoyaltyCardNumber;
    }

    /**
     * @param string $customerLoyaltyCardNumber
     */
    public function setCustomerLoyaltyCardNumber($customerLoyaltyCardNumber)
    {
        $this->customerLoyaltyCardNumber = $customerLoyaltyCardNumber;
    }

    /**
     * @return string
     */
    public function getCustomerEmail()
    {
        return $this->customerEmail;
    }

    /**
     * @param string $customerEmail
     */
    public function setCustomerEmail($customerEmail)
    {
        $this->customerEmail = $customerEmail;
    }

    /**
     * @return string
     */
    public function getCustomerPhone()
    {
        return $this->customerPhone;
    }

    /**
     * @param string $customerPhone
     */
    public function setCustomerPhone($customerPhone)
    {
        $this->customerPhone = $customerPhone;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param float $value
     */
    public function setValue($value)
    {
        $this->value = floatval($value);
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return string
     */
    public function getIssuer()
    {
        return $this->issuer;
    }

    /**
     * @param string $issuer
     */
    public function setIssuer($issuer)
    {
        $this->issuer = $issuer;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param string|DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = new DateTime($createdAt);
    }

    /**
     * @return \DateTime
     */
    public function getExpireAt()
    {
        return $this->expireAt;
    }

    /**
     * @param string|DateTime $expireAt
     */
    public function setExpireAt($expireAt)
    {
        $this->expireAt = new DateTime($expireAt);
    }
}
