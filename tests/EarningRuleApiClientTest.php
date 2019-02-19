<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyaltySDK\Tests;

use OpenLoyalty\SDK\Client\ApiHttpClient;
use OpenLoyalty\SDK\Client;
use OpenLoyalty\SDK\Model\CustomerId;

/**
 * Class EarningRuleApiClientTest
 * @package OpenLoyaltySDK\Tests
 */
class EarningRuleApiClientTest extends ApiClientTestCase
{
    /**
     * @test
     * @throws \Assert\AssertionFailedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testReportCustomEvent()
    {
        $client = new Client(
            new ApiHttpClient([
                'apiUrl' => getenv('OL_URL')
            ])
        );

        $client->login(self::ADMIN_USERNAME, self::ADMIN_PASSWORD);

        $response = $client->earningRule()->reportCustomEvent(
            'facebook_like',
            new CustomerId('00000000-0000-474c-b092-b0dd880c07e1')
        );

        $this->assertNotEmpty($response->getPoints());
    }
}
