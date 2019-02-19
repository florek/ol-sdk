<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Model;

/**
 * Class Sku
 * @package OpenLoyalty\SDK\Model
 */
class Sku
{
    /**
     * @var string
     */
    protected $code;

    /**
     * SKU constructor.
     *
     * @param string $code
     */
    public function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    public function __toString()
    {
        return $this->code;
    }
}
