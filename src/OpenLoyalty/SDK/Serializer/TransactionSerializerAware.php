<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Serializer;

/**
 * Interface TransactionSerializerAware
 * @package OpenLoyalty\SDK\Serializer
 */
interface TransactionSerializerAware
{
    /**
     * @param TransactionSerializerInterface $transactionSerializer
     * @return mixed
     */
    public function setTransactionSerializer(TransactionSerializerInterface $transactionSerializer);
}
