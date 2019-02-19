<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Deserializer;

use OpenLoyalty\SDK\Model\Address;
use OpenLoyalty\SDK\Model\Company;
use OpenLoyalty\SDK\Model\Customer;
use OpenLoyalty\SDK\Model\Gender;

/**
 * Class CustomerDeserializer
 * @package OpenLoyalty\SDK\Deserializer
 */
class CustomerDeserializer extends AbstractDeserializer implements CustomerDeserializerInterface
{
    /**
     * @param array $data
     * @return Customer
     * @throws \Assert\AssertionFailedException
     */
    public function deserialize(array $data): Customer
    {
        $customer = new Customer();

        foreach ($data as $key => $val) {
            if (0 === strcasecmp($key, 'address')) {
                $customer->setAddress($this->addressDeserialize($val));
            } else {
                $this->set($customer, $key, $val);
            }
        }

        return $customer;
    }

    /**
     * @param array $data
     * @return Address
     */
    private function addressDeserialize(array $data): Address
    {
        $address = new Address();
        foreach ($data as $key => $val) {
            $this->set($address, $key, $val);
        }

        return $address;
    }
}
