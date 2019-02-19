<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Serializer;

/**
 * Class SerializerFactory
 * @package OpenLoyalty\SDK\Serializer
 */
class SerializerFactory implements TransactionSerializerAware, CustomerSerializerAware, SerializerFactoryInterface
{
    /**
     * @var CustomerSerializerInterface
     */
    private $customerSerializer;

    /**
     * @var TransactionSerializerInterface
     */
    private $transactionSerializer;

    /**
     * @param CustomerSerializerInterface $customerSerializer
     * @return mixed
     */
    public function setCustomerSerializer(CustomerSerializerInterface $customerSerializer)
    {
        $this->customerSerializer = $customerSerializer;
    }

    /**
     * @param TransactionSerializerInterface $transactionSerializer
     * @return mixed
     */
    public function setTransactionSerializer(TransactionSerializerInterface $transactionSerializer)
    {
        $this->transactionSerializer = $transactionSerializer;
    }

    /**
     * @return CustomerSerializerInterface
     */
    public function getCustomerSerializer(): CustomerSerializerInterface
    {
        if (null == $this->customerSerializer) {
            $this->setCustomerSerializer(new CustomerSerializer());
        }

        return $this->customerSerializer;
    }

    /**
     * @return TransactionSerializerInterface
     */
    public function getTransactionSerializer(): TransactionSerializerInterface
    {
        if (null === $this->transactionSerializer) {
            $this->setTransactionSerializer(new TransactionSerializer(
                $this->getCustomerSerializer()
            ));
        }

        return $this->transactionSerializer;
    }
}
