<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\DTO;

use OpenLoyalty\SDK\Model\CustomerId;

/**
 * Class InvitationsQuery
 * @package OpenLoyalty\SDK\DTO
 */
class InvitationsQuery
{
    /**
     * @var int
     */
    private $page;

    /**
     * @var int
     */
    private $perPage;

    /**
     * @var string
     */
    private $sort;

    /**
     * @var string
     */
    private $direction;

    /**
     * @var CustomerId
     */
    private $referrerId;

    /**
     * @var string
     */
    private $referrerEmail;

    /**
     * @var string
     */
    private $referrerName;

    /**
     * @var CustomerId
     */
    private $recipientId;

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

    const STATUS_INVITED = 'invited';
    const STATUS_REGISTERED = 'registered';
    const STATUS_MADE_PURCHASE = 'made_purchase';

    /**
     * TransactionQuery constructor.
     * @param array $query
     */
    public function __construct(array $query = [])
    {
        foreach ($query as $key => $val) {
            $method = sprintf('set%s', ucfirst($key));
            if (method_exists($this, $method)) {
                call_user_func([$this, $method], $val);
            }
        }
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param int $page
     */
    public function setPage(int $page)
    {
        $this->page = $page;
    }

    /**
     * @return int
     */
    public function getPerPage()
    {
        return $this->perPage;
    }

    /**
     * @param int $perPage
     */
    public function setPerPage(int $perPage)
    {
        $this->perPage = $perPage;
    }

    /**
     * @return string
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param string $sort
     */
    public function setSort(string $sort)
    {
        $this->sort = $sort;
    }

    /**
     * @return string
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * @param string $direction
     */
    public function setDirection(string $direction)
    {
        $this->direction = $direction;
    }

    /**
     * @return CustomerId
     */
    public function getReferrerId()
    {
        return $this->referrerId;
    }

    /**
     * @param CustomerId $referrerId
     */
    public function setReferrerId(CustomerId $referrerId)
    {
        $this->referrerId = $referrerId;
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
     * @return CustomerId
     */
    public function getRecipientId()
    {
        return $this->recipientId;
    }

    /**
     * @param CustomerId $recipientId
     */
    public function setRecipientId(CustomerId $recipientId)
    {
        $this->recipientId = $recipientId;
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
}
