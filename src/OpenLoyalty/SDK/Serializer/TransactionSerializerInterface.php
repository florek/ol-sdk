<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Serializer;

use OpenLoyalty\SDK\Model\Transaction;

/**
 * Interface TransactionSerializerInterface
 * @package OpenLoyalty\SDK\Serializer
 */
interface TransactionSerializerInterface
{
    /**
     * @param Transaction $transaction
     * @return array
     */
    public function registerRequestDataFormat(Transaction $transaction) : array;

    /**
     * @param Transaction $transaction
     * @return array
     */
    public function simulateRequestDataFormat(Transaction $transaction) : array;
}
