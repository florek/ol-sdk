<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Client;

/**
 * Class SettingsApiClient
 * @package OpenLoyalty\SDK\Client
 */
class SettingsApiClient extends BaseApiClient
{
    /**
     * @return \OpenLoyalty\SDK\DTO\SettingsResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function settings()
    {
        $response = $this->request('GET', '/api/settings');
        $json = $this->getJson($response);

        if (isset($json['settings'])) {
            return $this->getDeserializerFactory()
                ->getSettingsResponseDeserializer()
                ->deserialize($json['settings']);
        }
    }
}
