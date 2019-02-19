<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */
namespace OpenLoyalty\SDK\Model;

use Assert\Assertion as Assert;

/**
 * Class Company
 * @package OpenLoyalty\SDK\Model
 */
class Company
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $nip;

    /**
     * Company constructor.
     * @param $name
     * @param $nip
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($name, $nip)
    {
        Assert::notBlank($name);
        Assert::notBlank($nip);

        $this->name = $name;
        $this->nip = $nip;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getNip()
    {
        return $this->nip;
    }
}
