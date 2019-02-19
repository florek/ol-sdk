<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyaltySDK\Tests;

use OpenLoyalty\SDK\Client\ApiHttpClient;
use OpenLoyalty\SDK\Client;
use OpenLoyalty\SDK\DTO\PointsQuery;
use OpenLoyalty\SDK\Model\CustomerId;

/**
 * Class PointsApiClientTest
 * @package OpenLoyaltySDK\Tests
 */
class PointsApiClientTest extends ApiClientTestCase
{
    /**
     * @test
     * @throws \Assert\AssertionFailedException
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

        $transfers = $client->points()->list(new PointsQuery([
            'customerId' => new CustomerId('00000000-0000-474c-b092-b0dd880c07e1')
        ]));

        $this->assertNotEmpty($transfers);
    }
}
