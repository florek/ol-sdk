<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Serializer;

/**
 * Interface CustomerSerializerAware
 * @package OpenLoyalty\SDK\Serializer
 */
interface CustomerSerializerAware
{
    /**
     * @param CustomerSerializerInterface $customerSerializer
     * @return mixed
     */
    public function setCustomerSerializer(CustomerSerializerInterface $customerSerializer);
}
