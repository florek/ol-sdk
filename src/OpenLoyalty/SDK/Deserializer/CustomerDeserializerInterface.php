<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Deserializer;

use OpenLoyalty\SDK\Model\Customer;

/**
 * Interface CustomerDeserializerInterface
 * @package OpenLoyalty\SDK\Deserializer
 */
interface CustomerDeserializerInterface
{
    /**
     * @param array $data
     * @return Customer
     */
    public function deserialize(array $data): Customer;
}
