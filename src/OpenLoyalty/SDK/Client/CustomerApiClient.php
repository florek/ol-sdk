<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Client;

use GuzzleHttp\Exception\ClientException;
use OpenLoyalty\SDK\Exception\ValidationError;
use OpenLoyalty\SDK\Model\Customer;
use OpenLoyalty\SDK\Model\CustomerId;

/**
 * Class CustomerApiClient
 * @package OpenLoyalty\SDK\Client
 */
class CustomerApiClient extends BaseApiClient
{
    /**
     * @param Customer $customer
     * @return \OpenLoyalty\SDK\DTO\CustomerStatusResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function status(Customer $customer)
    {
        $response = $this->request(
            'GET',
            sprintf('/api/admin/customer/%s/status', $customer->getId())
        );

        return $this->getDeserializerFactory()->getCustomerStatusResponseDeserializer()->deserialize(
            $this->getJson($response)
        );
    }

    /**
     * @param Customer $customer
     * @return Customer
     * @throws \Assert\AssertionFailedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws ValidationError
     */
    public function register(Customer $customer)
    {
        try {
            $data = $this->getSerializerFactory()->getCustomerSerializer()->serialize($customer);
            $response = $this->requestForm(
                'POST',
                '/api/customer/register',
                ['customer' => $data]
            );
            $json = $this->getJson($response);
            $customer->setId(new CustomerId($json['customerId']));

            return $customer;
        } catch (ClientException $e) {
            throw new ValidationError('Validation error', $e->getRequest(), $e->getResponse(), $e);
        }
    }

    /**
     * @param CustomerId $customerId
     * @return Customer
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function find(CustomerId $customerId)
    {
        try {
            $response = $this->request('GET', sprintf('/api/customer/%s', (string)$customerId));
            return $this->getDeserializerFactory()->getCustomerDeserializer()->deserialize($this->getJson($response));
        } catch (ClientException $e) {
            throw new ValidationError('Validation error', $e->getRequest(), $e->getResponse(), $e);
        }
    }

    /**
     * @param Customer $customer
     * @return Customer
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws ValidationError
     */
    public function update(Customer $customer)
    {
        $data = $this->getSerializerFactory()->getCustomerSerializer()->serialize($customer);

        try {
            $response = $this->requestForm(
                'PUT',
                sprintf('/api/customer/%s', (string)$customer->getId()),
                ['customer' => $data]
            );

            return $this->getDeserializerFactory()->getCustomerDeserializer()->deserialize($this->getJson($response));
        } catch (ClientException $e) {
            throw new ValidationError('Validation error', $e->getRequest(), $e->getResponse(), $e);
        }
    }

    /**
     * @param $token
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function activate($token)
    {
        return $this->activateCustomer(sprintf('/api/customer/activate/%s', $token));
    }

    /**
     * @param $code
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function activateSms($code)
    {
        return $this->activateCustomer(sprintf('/api/customer/activate-sms/%s', $code));
    }

    /**
     * @param $uri
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function activateCustomer($uri)
    {
        try {
            return $this->getJson($this->request('POST', $uri));
        } catch (ClientException $e) {
            throw new ValidationError('Validation error', $e->getRequest(), $e->getResponse(), $e);
        }
    }
}
