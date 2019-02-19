<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */
namespace OpenLoyalty\SDK\Model;

/**
 * Class Invitation
 * @package OpenLoyalty\SDK\Model
 */
class Invitation
{
    const STATUS_INVITED = 'invited';
    const STATUS_REGISTERED = 'registered';
    const STATUS_MADE_PURCHASE = 'made_purchase';

    /**
     * @var CustomerId
     */
    private $referrerId;

    /**
     * @var CustomerId
     */
    private $recipientId;

    /**
     * @var InvitationId
     */
    private $invitationId;

    /**
     * @var string
     */
    private $referrerEmail;

    /**
     * @var string
     */
    private $referrerName;

    /**
     * @var string
     */
    private $recipientEmail;

    /**
     * @var string
     */
    private $recipientName;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $token;

    /**
     * @return CustomerId
     */
    public function getReferrerId()
    {
        return $this->referrerId;
    }

    /**
     * @param CustomerId $referrerId
     * @throws \Assert\AssertionFailedException
     */
    public function setReferrerId($referrerId)
    {
        if (empty($referrerId)) {
            return;
        }

        if (is_string($referrerId)) {
            $referrerId = new CustomerId($referrerId);
        } elseif (!$referrerId instanceof CustomerId) {
            throw new \InvalidArgumentException('Invalid id');
        }
        $this->referrerId = $referrerId;
    }

    /**
     * @return CustomerId
     */
    public function getRecipientId()
    {
        return $this->recipientId;
    }

    /**
     * @param CustomerId $recipientId
     * @throws \Assert\AssertionFailedException
     */
    public function setRecipientId($recipientId)
    {
        if (empty($recipientId)) {
            return;
        }

        if (is_string($recipientId)) {
            $recipientId = new CustomerId($recipientId);
        } elseif (!$recipientId instanceof CustomerId) {
            throw new \InvalidArgumentException('Invalid id');
        }
        $this->recipientId = $recipientId;
    }

    /**
     * @return InvitationId
     */
    public function getInvitationId()
    {
        return $this->invitationId;
    }

    /**
     * @param InvitationId $invitationId
     * @throws \Assert\AssertionFailedException
     */
    public function setInvitationId($invitationId)
    {
        if (is_string($invitationId)) {
            $invitationId = new InvitationId($invitationId);
        } elseif (!$invitationId instanceof InvitationId) {
            throw new \InvalidArgumentException('Invalid id');
        }
        $this->invitationId = $invitationId;
    }

    /**
     * @return string
     */
    public function getReferrerEmail()
    {
        return $this->referrerEmail;
    }

    /**
     * @param string $referrerEmail
     */
    public function setReferrerEmail(string $referrerEmail)
    {
        $this->referrerEmail = $referrerEmail;
    }

    /**
     * @return string
     */
    public function getReferrerName()
    {
        return $this->referrerName;
    }

    /**
     * @param string $referrerName
     */
    public function setReferrerName(string $referrerName)
    {
        $this->referrerName = $referrerName;
    }

    /**
     * @return string
     */
    public function getRecipientEmail()
    {
        return $this->recipientEmail;
    }

    /**
     * @param string $recipientEmail
     */
    public function setRecipientEmail(string $recipientEmail)
    {
        $this->recipientEmail = $recipientEmail;
    }

    /**
     * @return string
     */
    public function getRecipientName()
    {
        return $this->recipientName;
    }

    /**
     * @param string $recipientName
     */
    public function setRecipientName(string $recipientName)
    {
        $this->recipientName = $recipientName;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token)
    {
        $this->token = $token;
    }
}
