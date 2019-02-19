<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Deserializer;

use OpenLoyalty\SDK\DTO\CustomerStatusResponse;

/**
 * Class CustomerStatusResponseDeserializer
 * @package OpenLoyalty\SDK\Deserializer
 */
class CustomerStatusResponseDeserializer extends AbstractDeserializer implements CustomerStatusResponseDeserializerInterface
{
    /**
     * @param array $data
     * @return CustomerStatusResponse
     */
    public function deserialize(array $data): CustomerStatusResponse
    {
        $customerStatusResponse = new CustomerStatusResponse();
        foreach ($data as $key => $val) {
            $this->set($customerStatusResponse, $key, $val);
        }

        return $customerStatusResponse;
    }
}
