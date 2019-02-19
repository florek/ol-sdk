<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Deserializer;

/**
 * Interface CustomerStatusResponseDeserializerAware
 * @package OpenLoyalty\SDK\Deserializer
 */
interface CustomerStatusResponseDeserializerAware
{
    /**
     * @param CustomerStatusResponseDeserializerInterface $customerStatusResponseDeserializer
     * @return mixed
     */
    public function setCustomerStatusResponseDeserializer(CustomerStatusResponseDeserializerInterface $customerStatusResponseDeserializer);
}
