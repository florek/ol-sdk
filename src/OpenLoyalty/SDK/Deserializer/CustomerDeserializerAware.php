<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Deserializer;

/**
 * Interface CustomerDeserializerAware
 * @package OpenLoyalty\SDK\Deserializer
 */
interface CustomerDeserializerAware
{
    /**
     * @param CustomerDeserializerInterface $customerDeserializer
     * @return mixed
     */
    public function setCustomerDeserializer(CustomerDeserializerInterface $customerDeserializer);
}
