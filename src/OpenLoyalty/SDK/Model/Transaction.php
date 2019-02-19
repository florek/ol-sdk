<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Model;

/**
 * Class Transaction
 * @package OpenLoyalty\SDK\Model
 */
class Transaction
{
    /**
     * @var TransactionId
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $purchaseDate;

    /**
     * @var TransactionItem[]
     */
    private $items;

    /**
     * @var Customer
     */
    private $customer;

    /**
     * @var string
     */
    private $revisedDocument;

    /**
     * @var string
     */
    private $documentType;

    /**
     * @var string
     */
    private $documentNumber;

    /**
     * @var string
     */
    private $purchasePlace;

    /**
     * @var PosId
     */
    private $posId;

    /**
     * @var float
     */
    private $pointsEarned;

    const TYPE_RETURN = 'return';
    const TYPE_SELL = 'sell';

    /**
     * Transaction constructor.
     * @param array $items
     * @param \DateTime $purchaseDate
     */
    public function __construct(array $items, \DateTime $purchaseDate = null)
    {
        $this->items = $items;
        $this->purchaseDate = $purchaseDate ?: new \DateTime();
    }

    /**
     * @return TransactionId
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param TransactionId|string $id
     * @throws \Assert\AssertionFailedException
     */
    public function setId($id)
    {
        if (is_string($id)) {
            $id = new TransactionId($id);
        } elseif (!$id instanceof TransactionId) {
            throw new \InvalidArgumentException(
                'Invalid id'
            );
        }
        $this->id = $id;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return string
     */
    public function getDocumentType()
    {
        return $this->documentType;
    }

    /**
     * @param string $documentType
     */
    public function setDocumentType($documentType)
    {
        $this->documentType = $documentType;
    }

    /**
     * @return string
     */
    public function getDocumentNumber()
    {
        return $this->documentNumber;
    }

    /**
     * @param string $documentNumber
     */
    public function setDocumentNumber($documentNumber)
    {
        $this->documentNumber = $documentNumber;
    }

    /**
     * @return string
     */
    public function getPurchasePlace()
    {
        return $this->purchasePlace;
    }

    /**
     * @param string $purchasePlace
     */
    public function setPurchasePlace($purchasePlace)
    {
        $this->purchasePlace = $purchasePlace;
    }

    /**
     * @return string
     */
    public function getRevisedDocument()
    {
        return $this->revisedDocument;
    }

    /**
     * @param string $revisedDocument
     */
    public function setRevisedDocument($revisedDocument)
    {
        $this->revisedDocument = $revisedDocument;
    }

    /**
     * @return PosId
     */
    public function getPosId()
    {
        return $this->posId;
    }

    /**
     * @param string|PosId $posId
     * @throws \Assert\AssertionFailedException
     */
    public function setPosId($posId)
    {
        if (is_string($posId)) {
            $posId = new PosId($posId);
        } elseif (!$posId instanceof PosId) {
            throw new \InvalidArgumentException(
                'Invalid posId'
            );
        }

        $this->posId = $posId;
    }

    /**
     * @return \DateTime
     */
    public function getPurchaseDate(): \DateTime
    {
        return $this->purchaseDate;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return float
     */
    public function getPointsEarned()
    {
        return $this->pointsEarned;
    }

    /**
     * @param float $pointsEarned
     */
    public function setPointsEarned($pointsEarned)
    {
        $this->pointsEarned = floatval($pointsEarned);
    }
}
