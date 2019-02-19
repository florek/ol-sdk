<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Serializer;

/**
 * Interface SerializerFactoryInterface
 * @package OpenLoyalty\SDK\Serializer
 */
interface SerializerFactoryInterface
{
    /**
     * @return CustomerSerializerInterface
     */
    public function getCustomerSerializer(): CustomerSerializerInterface;

    /**
     * @return TransactionSerializerInterface
     */
    public function getTransactionSerializer(): TransactionSerializerInterface;
}
