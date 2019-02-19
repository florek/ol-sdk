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
 * Class CustomerSerializer
 * @package OpenLoyalty\SDK\Serializer
 */
class CustomerSerializer implements CustomerSerializerInterface
{
    /**
     * @param Customer $customer
     * @return array
     */
    public function serialize(Customer $customer): array
    {
        $data = [];

        if (null !== $customer->getFirstName()) {
            $data['firstName'] = $customer->getFirstName();
        }

        if (null !== $customer->getLastName()) {
            $data['lastName'] = $customer->getLastName();
        }

        if (null !== $customer->getEmail()) {
            $data['email'] = $customer->getEmail();
        }

        if (null !== $customer->getPhone()) {
            $data['phone'] = $customer->getPhone();
        }

        if (null !== $customer->getAddress()) {
            $data['address'] = $this->addressSerialize($customer->getAddress());
        }

        if (null !== $customer->getBirthDate()) {
            $data['birthDate'] = $customer->getBirthDate();
        }

        if (null !== $customer->isAgreement1()) {
            $data['agreement1'] = ($customer->isAgreement1()) ? 1 : 0;
        }

        if (null !== $customer->isAgreement2()) {
            $data['agreement2'] = ($customer->isAgreement2()) ? 1 : 0;
        }

        if (null !== $customer->isAgreement3()) {
            $data['agreement3'] = ($customer->isAgreement3()) ? 1 : 0;
        }

        if (null !== $customer->getLoyaltyCardNumber()) {
            $data['loyaltyCardNumber'] = $customer->getLoyaltyCardNumber();
        }

        if (null !== $customer->getCompany()) {
            $data['company'] = $this->companySerialize($customer->getCompany());
        }

        return $data;
    }


    /**
     * @param Address|null $address
     * @return array
     */
    public function addressSerialize(Address $address = null): array
    {
        return [
            'street' => (null !== $address) ? $address->getStreet() : '',
            'address1' => (null !== $address) ? $address->getAddress1() : '',
            'address2' => (null !== $address) ? $address->getAddress2() : '',
            'postal' => (null !== $address) ? $address->getPostal() : '',
            'city' => (null !== $address) ? $address->getCity() : '',
            'province' => (null !== $address) ? $address->getProvince() : '',
            'country' => (null !== $address) ? $address->getCountry() : '',
        ];
    }

    /**
     * @param Company|null $company
     * @return array
     */
    public function companySerialize(Company $company = null) : array
    {
        return [
            'name' => (null !== $company) ? $company->getName() : '',
            'nip' => (null !== $company) ? $company->getNip()  : ''
        ];
    }
}
