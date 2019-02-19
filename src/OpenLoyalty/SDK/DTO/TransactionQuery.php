<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\DTO;

use OpenLoyalty\SDK\Model\CustomerId;

/**
 * Class TransactionQuery
 * @package OpenLoyalty\SDK\DTO
 */
class TransactionQuery
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
    private $customerId;

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
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param CustomerId $customerId
     */
    public function setCustomerId(CustomerId $customerId)
    {
        $this->customerId = $customerId;
    }
}
