<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Deserializer;

use OpenLoyalty\SDK\DTO\SettingsResponse;

/**
 * Class SettingsResponseDeserializer
 * @package OpenLoyalty\SDK\Deserializer
 */
class SettingsResponseDeserializer extends AbstractDeserializer implements SettingsResponseDeserializerInterface
{
    /**
     * @param array $data
     * @return SettingsResponse
     */
    public function deserialize(array $data): SettingsResponse
    {
        $settingsResponse = new SettingsResponse();

        foreach ($data as $key => $val) {
            $this->set($settingsResponse, $key, $val);
        }

        return $settingsResponse;
    }
}
