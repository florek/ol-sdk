<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Model;

/**
 * Class Item.
 */
class TransactionItem
{
    /**
     * @var string
     */
    protected $sku;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @var float
     */
    protected $grossValue;

    /**
     * @var string
     */
    protected $category;

    /**
     * @var string
     */
    protected $maker;

    /**
     * @var Label[]
     */
    protected $labels;

    /**
     * Item constructor.
     *
     * @param SKU     $sku
     * @param string  $name
     * @param int     $quantity
     * @param float   $grossValue
     * @param string  $category
     * @param string  $maker
     * @param Label[] $labels
     */
    public function __construct(Sku $sku, $name, $quantity, $grossValue, $category, $maker = null, array $labels = [])
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->grossValue = $grossValue;
        $this->category = $category;
        $this->maker = $maker;
        $this->labels = $labels;
    }

    /**
     * @return SKU
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return float
     */
    public function getGrossValue()
    {
        return $this->grossValue;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return string
     */
    public function getMaker()
    {
        return $this->maker;
    }

    /**
     * @return Label[]
     */
    public function getLabels()
    {
        return $this->labels;
    }
}
