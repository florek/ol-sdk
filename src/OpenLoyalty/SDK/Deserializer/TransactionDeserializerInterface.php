<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Deserializer;

use OpenLoyalty\SDK\Model\Transaction;

/**
 * Interface TransactionDeserializerInterface
 * @package OpenLoyalty\SDK\Deserializer
 */
interface TransactionDeserializerInterface
{
    /**
     * @param array $data
     * @return Transaction
     */
    public function deserialize(array $data) : Transaction;
}
