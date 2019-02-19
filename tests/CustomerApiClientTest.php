<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyaltySDK\Tests;

use OpenLoyalty\SDK\Client;
use OpenLoyalty\SDK\Client\ApiHttpClient;
use OpenLoyalty\SDK\Model\Customer;
use OpenLoyalty\SDK\Model\CustomerId;

/**
 * Class CustomerApiClientTest
 * @package OpenLoyaltySDK\Tests
 */
class CustomerApiClientTest extends ApiClientTestCase
{
    /**
     * @test
     * @throws \Assert\AssertionFailedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testRegister()
    {
        $client = new Client(
            new ApiHttpClient([
                'apiUrl' => getenv('OL_URL')
            ])
        );

        $client->login(self::ADMIN_USERNAME, self::ADMIN_PASSWORD);

        $customer = new Customer();

        $customer->setFirstName('John');
        $customer->setLastName('Doe');
        $customer->setEmail(sprintf('%s@example.com', md5(microtime(true))));
        $customer->setAgreement1(true);

        $client->customer()->register($customer);

        $this->assertNotEmpty($customer->getId());
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testUpdate()
    {
        $client = new Client(
            new ApiHttpClient([
                'apiUrl' => getenv('OL_URL')
            ])
        );

        $client->login(self::ADMIN_USERNAME, self::ADMIN_PASSWORD);

        $customer = new Customer();
        $customer->setId(new CustomerId('00000000-0000-474c-b092-b0dd880c07e1'));
        $customer->setFirstName('John');
        $customer->setLastName('Doe');
        $customer->setEmail('user@oloy.com');
        $customer->setAgreement1(1);
        $customer->setLoyaltyCardNumber('1123123');


        $updatedCustomer = $client->customer()->update($customer);

        $this->assertNotEmpty($updatedCustomer->getUpdatedAt());
        $this->assertEquals($customer->getEmail(), $updatedCustomer->getEmail());
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testFind()
    {
        $client = new Client(
            new ApiHttpClient([
                'apiUrl' => getenv('OL_URL')
            ])
        );

        $client->login(self::ADMIN_USERNAME, self::ADMIN_PASSWORD);

        $customer = $client->customer()->find(new CustomerId('00000000-0000-474c-b092-b0dd880c07e1'));

        $this->assertNotEmpty($customer->getEmail());

        $this->assertEquals('John', $customer->getFirstName());
        $this->assertEquals('Doe', $customer->getLastName());
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testStatus()
    {
        $client = new Client(
            new ApiHttpClient([
                'apiUrl' => getenv('OL_URL')
            ])
        );

        $client->login(self::ADMIN_USERNAME, self::ADMIN_PASSWORD);

        $customer = new Customer();
        $customer->setId(new CustomerId('00000000-0000-474c-b092-b0dd880c07e1'));

        $customerStatusResposne = $client->customer()->status($customer);

        $this->assertNotEmpty($customerStatusResposne->getPoints());
    }
}
