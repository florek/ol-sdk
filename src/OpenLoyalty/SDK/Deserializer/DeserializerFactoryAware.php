<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Deserializer;

/**
 * Interface DeserializerFactoryAware
 * @package OpenLoyalty\SDK\Deserializer
 */
interface DeserializerFactoryAware
{
    /**
     * @param DeserializerFactoryInterface $deserializerFactory
     * @return mixed
     */
    public function setDeserializerFactory(DeserializerFactoryInterface $deserializerFactory);
}
