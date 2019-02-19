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
 * Class InvitationsApiClientTest
 * @package OpenLoyaltySDK\Tests
 */
class InvitationsApiClientTest extends ApiClientTestCase
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

        $invitations = $client->invitations()->list();

        $this->assertNotEmpty($invitations);
    }

    /**
     * @test
     * @throws \Assert\AssertionFailedException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testInvite()
    {
        $client = new Client(
            new ApiHttpClient([
                'apiUrl' => getenv('OL_URL')
            ])
        );

        $client->login(self::CUSTOMER_USERNAME, self::CUSTOMER_PASSWORD, Client::USER_TYPE_CUSTOMER);

        $invited = $client->invitations()->invite(sprintf('%s@example.com', md5(microtime(true))));

        $this->assertTrue($invited);
    }
}
