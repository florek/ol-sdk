<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Deserializer;

use OpenLoyalty\SDK\DTO\CustomerStatusResponse;

/**
 * Interface CustomerStatusResponseDeserializerInterface
 * @package OpenLoyalty\SDK\Deserializer
 */
interface CustomerStatusResponseDeserializerInterface
{
    /**
     * @param array $data
     * @return CustomerStatusResponse
     */
    public function deserialize(array $data): CustomerStatusResponse;
}
