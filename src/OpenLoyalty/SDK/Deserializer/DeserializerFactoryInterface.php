<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Deserializer;

/**
 * Interface DeserializerFactoryInterface
 * @package OpenLoyalty\SDK\Deserializer
 */
interface DeserializerFactoryInterface
{
    /**
     * @return CustomerDeserializerInterface
     */
    public function getCustomerDeserializer(): CustomerDeserializerInterface;

    /**
     * @return CustomerStatusResponseDeserializerInterface
     */
    public function getCustomerStatusResponseDeserializer(): CustomerStatusResponseDeserializerInterface;

    /**
     * @return TransactionDeserializerInterface
     */
    public function getTransactionDeserializer(): TransactionDeserializerInterface;

    /**
     * @return PointsTransferDeserializerInterface
     */
    public function getPointsTransferDeserializer(): PointsTransferDeserializerInterface;

    /**
     * @return SettingsResponseDeserializerInterface
     */
    public function getSettingsResponseDeserializer(): SettingsResponseDeserializerInterface;

    /**
     * @return InvitationDeserializerInterface
     */
    public function getInvitationDeserializer(): InvitationDeserializerInterface;
}
