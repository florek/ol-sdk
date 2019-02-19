<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Serializer;

/**
 * Interface SerializerFactoryAware
 * @package OpenLoyalty\SDK\Serializer
 */
interface SerializerFactoryAware
{
    /**
     * @param SerializerFactoryInterface $serializerFactory
     */
    public function setSerializerFactory(SerializerFactoryInterface $serializerFactory);
}
