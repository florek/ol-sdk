<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Deserializer;

/**
 * Interface TransactionDeserializerAware
 * @package OpenLoyalty\SDK\Deserializer
 */
interface TransactionDeserializerAware
{
    /**
     * @param TransactionDeserializerInterface $transactionDeserializer
     * @return mixed
     */
    public function setTransactionDeserializer(TransactionDeserializerInterface $transactionDeserializer);
}
