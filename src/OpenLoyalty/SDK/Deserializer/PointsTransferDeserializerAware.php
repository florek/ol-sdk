<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Deserializer;

/**
 * Interface PointsTransferDeserializerAware
 * @package OpenLoyalty\SDK\Deserializer
 */
interface PointsTransferDeserializerAware
{
    /**
     * @param PointsTransferDeserializerInterface $pointsTransferDeserializer
     * @return mixed
     */
    public function setPointsTransferDeserializer(PointsTransferDeserializerInterface $pointsTransferDeserializer);
}
