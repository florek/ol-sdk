<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Client;

use GuzzleHttp\Exception\ClientException;
use OpenLoyalty\SDK\DTO\CustomEventResponse;
use OpenLoyalty\SDK\Exception\ValidationError;
use OpenLoyalty\SDK\Model\CustomerId;

/**
 * Class EarningRuleApiClient
 * @package OpenLoyalty\SDK\Client
 */
class EarningRuleApiClient extends BaseApiClient
{
    /**
     * @param string $eventName
     * @param CustomerId $customerId
     * @return CustomEventResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws ValidationError
     */
    public function reportCustomEvent(string $eventName, CustomerId $customerId)
    {
        try {
            $response = $this->request(
                'POST',
                sprintf('/api/v1/earnRule/%s/customer/%s', $eventName, $customerId)
            );

            $json = $this->getJson($response);

            return new CustomEventResponse($json['points']);
        } catch (ClientException $e) {
            throw new ValidationError('Validation error', $e->getRequest(), $e->getResponse(), $e);
        }
    }
}
