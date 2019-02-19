<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Deserializer;

/**
 * Interface SettingsResponseDeserializerAware
 * @package OpenLoyalty\SDK\Deserializer
 */
interface SettingsResponseDeserializerAware
{
    /**
     * @param SettingsResponseDeserializerInterface $settingsResponseDeserializer
     * @return mixed
     */
    public function setSettingsResponseDeserializer(SettingsResponseDeserializerInterface $settingsResponseDeserializer);
}
