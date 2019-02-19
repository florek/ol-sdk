<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Serializer;

use OpenLoyalty\SDK\Model\Address;
use OpenLoyalty\SDK\Model\Company;
use OpenLoyalty\SDK\Model\Customer;

/**
 * Interface CustomerSerializerInterface
 * @package OpenLoyalty\SDK\Serializer
 */
interface CustomerSerializerInterface
{
    /**
     * @param Customer $customer
     * @return array
     */
    public function serialize(Customer $customer): array;


    /**
     * @param Address|null $address
     * @return array
     */
    public function addressSerialize(Address $address = null): array;

    /**
     * @param Company|null $company
     * @return array
     */
    public function companySerialize(Company $company = null) : array;
}
