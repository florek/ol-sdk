<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyaltySDK\Tests;

use OpenLoyalty\SDK\DTO\TransactionQuery;
use OpenLoyalty\SDK\Model\Address;
use OpenLoyalty\SDK\Model\Customer;
use OpenLoyalty\SDK\Model\CustomerId;
use OpenLoyalty\SDK\Model\Sku;
use OpenLoyalty\SDK\Model\Transaction;
use OpenLoyalty\SDK\Model\TransactionItem;
use OpenLoyalty\SDK\Client;
use OpenLoyalty\SDK\Client\ApiHttpClient;
use DateTime;

/**
 * Class TransactionApiClient
 * @package OpenLoyaltySDK\Tests
 */
class TransactionApiClientTest extends ApiClientTestCase
{
    /**
     * @test
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testList()
    {
        $client = new Client(
            new ApiHttpClient([
                'apiUrl' => getenv('OL_URL')
            ])
        );

        $client->login(self::ADMIN_USERNAME, self::ADMIN_PASSWORD);

        $transactions = $client->transaction()->list(new TransactionQuery());

        $this->assertNotEmpty($transactions);
    }
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

        $items = [
            new TransactionItem(
                new Sku('SKU1'),
                'item 1',
                1,
                1,
                'test'

            ),
            new TransactionItem(
                new Sku('SKU2'),
                'item 1',
                1,
                11,
                'test'

            )
        ];

        $transaction = new Transaction($items, new DateTime());
        $customer = new Customer();
        $customer->setId(new CustomerId('00000000-0000-474c-b092-b0dd880c07e1'));
        $customer->setFirstName('John');
        $customer->setLastName('Doe');

        $address = new Address();
        $address->setCountry('Poland');
        $address->setPostal('00-000');
        $address->setStreet('Some street');
        $address->setCity('Some city');
        $address->setProvince('Some province');

        $customer->setAddress($address);

        $transaction->setCustomer($customer);
        $transaction->setDocumentNumber('Example001');
        $transaction->setDocumentType(Transaction::TYPE_SELL);

        $client->transaction()->register($transaction);

        $this->assertNotEmpty($transaction->getId());
    }

    /**
     * @test
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testSimulate()
    {
        $client = new Client(
            new ApiHttpClient([
                'apiUrl' => getenv('OL_URL')
            ])
        );

        $client->login(self::ADMIN_USERNAME, self::ADMIN_PASSWORD);

        $items = [
            new TransactionItem(
                new Sku('SKU1'),
                'item 1',
                1,
                1,
                'test'

            ),
            new TransactionItem(
                new Sku('SKU2'),
                'item 1',
                1,
                11,
                'test'

            )
        ];

        $transaction = new Transaction($items, new DateTime());
        $response = $client->transaction()->simulate($transaction);

        $this->assertNotEmpty($response->getPoints());
    }
}
