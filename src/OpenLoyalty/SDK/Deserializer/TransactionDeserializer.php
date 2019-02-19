<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Deserializer;

use OpenLoyalty\SDK\Model\CustomerId;
use OpenLoyalty\SDK\Model\Label;
use OpenLoyalty\SDK\Model\Sku;
use OpenLoyalty\SDK\Model\Transaction;
use OpenLoyalty\SDK\Model\TransactionId;
use OpenLoyalty\SDK\Model\TransactionItem;
use InvalidArgumentException;

/**
 * Class TransactionSerializer
 * @package OpenLoyalty\SDK\Serializer
 */
class TransactionDeserializer extends AbstractDeserializer implements TransactionDeserializerInterface, CustomerDeserializerAware
{
    /**
     * @var CustomerDeserializerInterface
     */
    private $customerDeserializer;

    /**
     * TransactionSerializer constructor.
     * @param CustomerDeserializerInterface $customerDeserializer
     */
    public function __construct(CustomerDeserializerInterface $customerDeserializer = null)
    {
        $this->customerDeserializer = $customerDeserializer;
    }

    /**
     * @param array $data
     * @return Transaction
     * @throws \Assert\AssertionFailedException
     */
    public function deserialize(array $data): Transaction
    {
        $transaction = new Transaction(
            $this->itemsDeserialize($data['items']),
            new \DateTime($data['purchaseDate'])
        );

        $transaction->setId(new TransactionId($data['transactionId']));
        $transaction->setCustomer(
            $this->getCustomerDeserializer()->deserialize($data['customerData'])
        );

        if (isset($data['customerId'])) {
            $transaction->getCustomer()->setId(
                new CustomerId($data['customerId'])
            );
        }

        foreach ($data as $key => $val) {
            if (!in_array($key, ['items', 'purchaseDate', 'transactionId', 'customerData', 'customerId'])) {
                $this->set($transaction, $key, $val);
            }
        }

        return $transaction;
    }

    /**
     * @param array $data
     * @return array
     */
    private function itemsDeserialize(array $data) : array
    {
        $items = [];
        foreach ($data as $item) {
            $labels = [];

            if (isset($item['labels'])) {
                foreach ($item['labels'] as $label) {
                    $labels[] = new Label(
                        $label['key'],
                        $label['value']
                    );
                }
            }

            $items[] = new TransactionItem(
                new Sku($item['sku']['code']),
                $item['name'],
                $item['quantity'],
                $item['grossValue'],
                $item['category'],
                (isset($item['maker'])) ? $item['maker'] : null,
                $labels
            );
        }

        return $items;
    }

    /**
     * @param CustomerDeserializerInterface $customerDeserializer
     * @return mixed
     */
    public function setCustomerDeserializer(CustomerDeserializerInterface $customerDeserializer)
    {
        $this->customerDeserializer = $customerDeserializer;
    }

    /**
     * @return CustomerDeserializerInterface
     */
    public function getCustomerDeserializer(): CustomerDeserializerInterface
    {
        if (null === $this->customerDeserializer) {
            throw new InvalidArgumentException(
                'CustomerDeserializer not set'
            );
        }
        return $this->customerDeserializer;
    }
}
