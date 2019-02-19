<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyaltySDK\Tests;

use OpenLoyalty\SDK\Client\ApiHttpClient;
use OpenLoyalty\SDK\Client;

/**
 * Class SettingsApiClientTest
 * @package OpenLoyaltySDK\Tests
 */
class SettingsApiClientTest extends ApiClientTestCase
{
    /**
     * @test
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testSettings()
    {
        $client = new Client(
            new ApiHttpClient([
                'apiUrl' => getenv('OL_URL')
            ])
        );

        $client->login(self::ADMIN_USERNAME, self::ADMIN_PASSWORD);

        $settings = $client->settings();

        $this->assertNotEmpty($settings->getProgramPointsPlural());
        $this->assertNotEmpty($settings->getProgramPointsSingular());
    }
}
