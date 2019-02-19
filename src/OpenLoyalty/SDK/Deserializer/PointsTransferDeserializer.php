<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Deserializer;

use OpenLoyalty\SDK\Model\PointsTransfer;

/**
 * Class PointsTransferDeserializer
 * @package OpenLoyalty\SDK\Deserializer
 */
class PointsTransferDeserializer extends AbstractDeserializer implements PointsTransferDeserializerInterface
{
    /**
     * @param array $data
     * @return PointsTransfer
     */
    public function deserialize(array $data): PointsTransfer
    {
        $pointsTransfer = new PointsTransfer();

        foreach ($data as $key => $val) {
            $this->set($pointsTransfer, $key, $val);
        }

        return $pointsTransfer;
    }
}
