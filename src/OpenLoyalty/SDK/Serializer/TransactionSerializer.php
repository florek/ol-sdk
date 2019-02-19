<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Serializer;

use OpenLoyalty\SDK\Model\Transaction;
use OpenLoyalty\SDK\Model\TransactionItem;
use InvalidArgumentException;

/**
 * Class TransactionSerializer
 * @package OpenLoyalty\SDK\Serializer
 */
class TransactionSerializer implements TransactionSerializerInterface, CustomerSerializerAware
{
    /**
     * @var CustomerSerializerInterface
     */
    private $customerSerializer;

    /**
     * TransactionSerializer constructor.
     * @param CustomerSerializerInterface $customerSerializer
     */
    public function __construct(CustomerSerializerInterface $customerSerializer = null)
    {
        $this->customerSerializer = $customerSerializer;
    }

    /**
     * @param Transaction $transaction
     * @return array
     */
    private function items(Transaction $transaction) : array
    {
        $items = [];
        /**
         * @var TransactionItem $item
         */
        foreach ($transaction->getItems() as $item) {
            $labels = [];
            foreach ($item->getLabels() as $label) {
                $labels[] = [
                    'key' => $label->getKey(),
                    'value' => $label->getValue(),
                ];
            }
            $items[] = [
                'sku' => ['code' => $item->getSku()->getCode()],
                'name' => $item->getName(),
                'quantity' => $item->getQuantity(),
                'grossValue' => $item->getGrossValue(),
                'category' => $item->getCategory(),
                'labels' => $labels,
                'maker' => $item->getMaker(),
            ];
        }

        return $items;
    }

    /**
     * @param Transaction $transaction
     * @throws InvalidArgumentException
     * @return array
     */
    public function registerRequestDataFormat(Transaction $transaction) : array
    {
        $data = [
            'items' => $this->items($transaction),
            'customerData' => [],
            'pos' => (null !== $transaction->getPosId()) ? $transaction->getPosId()->__toString() : null,
            'revisedDocument' => $transaction->getRevisedDocument(),
            'transactionData' => [
                'documentType' => $transaction->getDocumentType(),
                'documentNumber' => $transaction->getDocumentNumber(),
                'purchasePlace' => $transaction->getPurchasePlace(),
                'purchaseDate' => $transaction->getPurchaseDate()->format('Y-m-d\TH:i:s\Z')
            ]
        ];

        if (null !== $transaction->getCustomer()) {
            $data['customerData']['name']  = implode(' ', [
                $transaction->getCustomer()->getFirstName(),
                $transaction->getCustomer()->getLastName()
            ]);

            $data['customerData']['email']  = $transaction->getCustomer()->getEmail();
            $data['customerData']['phone']  = $transaction->getCustomer()->getPhone();
            $data['customerData']['loyaltyCardNumber']  = $transaction->getCustomer()->getLoyaltyCardNumber();

            if (null !== $transaction->getCustomer()->getCompany()) {
                $data['customerData']['nip']  = $transaction->getCustomer()->getCompany()->getNip();
            }

            if (null !== $transaction->getCustomer()->getAddress()) {
                $data['customerData']['address'] = $this->getCustomerSerializer()->addressSerialize($transaction->getCustomer()->getAddress());
            }
        }

        return $data;
    }

    /**
     * @param Transaction $transaction
     * @return array
     */
    public function simulateRequestDataFormat(Transaction $transaction) : array
    {
        $data = [
            'items' => $this->items($transaction),
            'purchaseDate' => $transaction->getPurchaseDate()->format(\DateTime::ATOM)
        ];

        return $data;
    }

    /**
     * @param CustomerSerializerInterface $customerSerializer
     * @return mixed
     */
    public function setCustomerSerializer(CustomerSerializerInterface $customerSerializer)
    {
        $this->customerSerializer = $customerSerializer;
    }

    /**
     * @return CustomerSerializerInterface
     */
    public function getCustomerSerializer(): CustomerSerializerInterface
    {
        if (null === $this->customerSerializer) {
            throw new InvalidArgumentException(
                'CustomerSerializer not set'
            );
        }
        return $this->customerSerializer;
    }
}
