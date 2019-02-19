<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Deserializer;

/**
 * Class DeserializerFactory
 * @package OpenLoyalty\SDK\Deserializer
 */
class DeserializerFactory implements TransactionDeserializerAware, SettingsResponseDeserializerAware, PointsTransferDeserializerAware, CustomerDeserializerAware, CustomerStatusResponseDeserializerAware, InvitationDeserializerAware, DeserializerFactoryInterface
{
    /**
     * @var CustomerDeserializerInterface
     */
    private $customerDeserializer;

    /**
     * @var TransactionDeserializerInterface
     */
    private $transactionDeserializer;

    /**
     * @var CustomerStatusResponseDeserializerInterface
     */
    private $customerStatusResponseDeserializer;

    /**
     * @var PointsTransferDeserializerInterface
     */
    private $pointsTransferDeserializer;

    /**
     * @var SettingsResponseDeserializerInterface
     */
    private $settingsResponseDeserializer;

    /**
     * @var InvitationDeserializerInterface
     */
    private $invitationDeserializer;

    /**
     * @param CustomerDeserializerInterface $customerDeserializer
     * @return mixed
     */
    public function setCustomerDeserializer(CustomerDeserializerInterface $customerDeserializer)
    {
        $this->customerDeserializer = $customerDeserializer;
    }

    /**
     * @param TransactionDeserializerInterface $transactionDeserializer
     * @return mixed
     */
    public function setTransactionDeserializer(TransactionDeserializerInterface $transactionDeserializer)
    {
        $this->transactionDeserializer = $transactionDeserializer;
    }

    /**
     * @return CustomerDeserializerInterface
     */
    public function getCustomerDeserializer(): CustomerDeserializerInterface
    {
        if (null == $this->customerDeserializer) {
            $this->setCustomerDeserializer(new CustomerDeserializer());
        }

        return $this->customerDeserializer;
    }

    /**
     * @return TransactionDeserializerInterface
     */
    public function getTransactionDeserializer(): TransactionDeserializerInterface
    {
        if (null === $this->transactionDeserializer) {
            $this->setTransactionDeserializer(new TransactionDeserializer(
                $this->getCustomerDeserializer()
            ));
        }

        return $this->transactionDeserializer;
    }

    /**
     * @param CustomerStatusResponseDeserializerInterface $customerStatusResponseDeserializer
     * @return mixed
     */
    public function setCustomerStatusResponseDeserializer(
        CustomerStatusResponseDeserializerInterface $customerStatusResponseDeserializer
    ) {
        $this->customerStatusResponseDeserializer = $customerStatusResponseDeserializer;
    }

    /**
     * @return CustomerStatusResponseDeserializerInterface
     */
    public function getCustomerStatusResponseDeserializer(): CustomerStatusResponseDeserializerInterface
    {
        if (null === $this->customerStatusResponseDeserializer) {
            $this->setCustomerStatusResponseDeserializer(
                new CustomerStatusResponseDeserializer()
            );
        }

        return $this->customerStatusResponseDeserializer;
    }

    /**
     * @return PointsTransferDeserializerInterface
     */
    public function getPointsTransferDeserializer(): PointsTransferDeserializerInterface
    {
        if (null === $this->pointsTransferDeserializer) {
            $this->setPointsTransferDeserializer(new PointsTransferDeserializer());
        }
        return $this->pointsTransferDeserializer;
    }

    /**
     * @param PointsTransferDeserializerInterface $pointsTransferDeserializer
     * @return mixed
     */
    public function setPointsTransferDeserializer(PointsTransferDeserializerInterface $pointsTransferDeserializer)
    {
        $this->pointsTransferDeserializer = $pointsTransferDeserializer;
    }

    /**
     * @return SettingsResponseDeserializerInterface
     */
    public function getSettingsResponseDeserializer(): SettingsResponseDeserializerInterface
    {
        if (null === $this->settingsResponseDeserializer) {
            $this->setSettingsResponseDeserializer(new SettingsResponseDeserializer());
        }

        return $this->settingsResponseDeserializer;
    }

    /**
     * @param SettingsResponseDeserializerInterface $settingsResponseDeserializer
     * @return mixed
     */
    public function setSettingsResponseDeserializer(SettingsResponseDeserializerInterface $settingsResponseDeserializer)
    {
        $this->settingsResponseDeserializer = $settingsResponseDeserializer;
    }

    /**
     * @return InvitationDeserializerInterface
     */
    public function getInvitationDeserializer(): InvitationDeserializerInterface
    {
        if (null === $this->invitationDeserializer) {
            $this->setInvitationDeserializer(new InvitationDeserializer());
        }

        return $this->invitationDeserializer;
    }

    /**
     * @param InvitationDeserializerInterface $invitationDeserializer
     * @return mixed
     */
    public function setInvitationDeserializer(InvitationDeserializerInterface $invitationDeserializer)
    {
        $this->invitationDeserializer = $invitationDeserializer;
    }
}
