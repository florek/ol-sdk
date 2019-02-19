<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Deserializer;

use OpenLoyalty\SDK\DTO\SettingsResponse;

/**
 * Interface SettingsResponseDeserializerInterface
 * @package OpenLoyalty\SDK\Deserializer
 */
interface SettingsResponseDeserializerInterface
{
    /**
     * @param array $data
     * @return SettingsResponse
     */
    public function deserialize(array $data): SettingsResponse;
}
