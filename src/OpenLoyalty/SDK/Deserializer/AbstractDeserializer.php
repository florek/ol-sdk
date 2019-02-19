<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Deserializer;

use OpenLoyalty\SDK\Model\Address;
use OpenLoyalty\SDK\Model\Company;
use OpenLoyalty\SDK\Model\Customer;

/**
 * Class AbstractDeserializer
 * @package OpenLoyalty\SDK\Deserializer
 */
abstract class AbstractDeserializer
{
    /**
     * @param $obj
     * @param string $name
     * @param $val
     */
    protected function set($obj, string $name, $val)
    {
        $method = sprintf('set%s', ucfirst($name));
        if (method_exists($obj, $method)) {
            call_user_func([$obj, $method], $val);
        }
    }
}
