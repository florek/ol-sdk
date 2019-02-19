<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Deserializer;

use OpenLoyalty\SDK\Model\PointsTransfer;

/**
 * Interface PointsTransferDeserializerInterface
 * @package OpenLoyalty\SDK\Deserializer
 */
interface PointsTransferDeserializerInterface
{
    /**
     * @param array $data
     * @return PointsTransfer
     */
    public function deserialize(array $data): PointsTransfer;
}
