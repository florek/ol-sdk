<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */
namespace OpenLoyalty\SDK\Model;

use Assert\Assertion as Assert;

/**
 * Class Customer
 * @package OpenLoyalty\SDK\Model
 */
class Customer
{
    /**
     * @var CustomerId
     */
    protected $id;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var Gender
     */
    protected $gender;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $phone;

    /**
     * @var \DateTime
     */
    protected $birthDate;

    /**
     * @var Address
     */
    protected $address;

    /**
     * @var string
     */
    protected $loyaltyCardNumber;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * @var \DateTime
     */
    protected $firstPurchaseAt;

    protected $agreement1 = false;

    protected $agreement2 = false;

    protected $agreement3 = false;

    /**
     * @var Company
     */
    protected $company = null;

    /**
     * @param CustomerId|string $id
     * @throws \Assert\AssertionFailedException
     */
    public function setId($id)
    {
        if (is_string($id)) {
            $id = new CustomerId($id);
        } elseif (!$id instanceof CustomerId) {
            throw new \InvalidArgumentException('Invalid id');
        }

        $this->id = $id;
    }

    /**
     * @return CustomerId
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param $firstName
     * @throws \Assert\AssertionFailedException
     */
    public function setFirstName($firstName)
    {
        Assert::notEmpty($firstName);
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param $lastName
     * @throws \Assert\AssertionFailedException
     */
    public function setLastName($lastName)
    {
        Assert::notEmpty($lastName);
        $this->lastName = $lastName;
    }

    /**
     * @return Gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param Gender $gender
     * @throws \Assert\AssertionFailedException
     */
    public function setGender($gender)
    {
        if (is_string($gender)) {
            $gender = new Gender($gender);
        } elseif (!$gender instanceof Gender) {
            throw new \InvalidArgumentException('Invalid gender');
        }

        Assert::notEmpty($gender);
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     * @throws \Assert\AssertionFailedException
     */
    public function setEmail($email)
    {
        Assert::notEmpty($email);
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param \DateTime $birthDate
     * @throws \Assert\AssertionFailedException
     */
    public function setBirthDate($birthDate)
    {
        if (is_string($birthDate)) {
            $birthDate = new \DateTime($birthDate);
        } elseif (!$birthDate instanceof \DateTime) {
            throw new \InvalidArgumentException('Invalid date');
        }
        Assert::notEmpty($birthDate);
        $this->birthDate = $birthDate;
    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param $address
     * @throws \Assert\AssertionFailedException
     */
    public function setAddress($address)
    {
        Assert::notEmpty($address);
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getLoyaltyCardNumber()
    {
        return $this->loyaltyCardNumber;
    }

    /**
     * @param $loyaltyCardNumber
     * @throws \Assert\AssertionFailedException
     */
    public function setLoyaltyCardNumber($loyaltyCardNumber)
    {
        Assert::notEmpty($loyaltyCardNumber);
        $this->loyaltyCardNumber = $loyaltyCardNumber;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @throws \Assert\AssertionFailedException
     */
    public function setCreatedAt($createdAt)
    {
        if (is_string($createdAt)) {
            $createdAt = new \DateTime($createdAt);
        } elseif (!$createdAt instanceof \DateTime) {
            throw new \InvalidArgumentException('Invalid date');
        }

        Assert::notEmpty($createdAt);
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        if (is_string($updatedAt)) {
            $updatedAt = new \DateTime($updatedAt);
        } elseif (!$updatedAt instanceof \DateTime) {
            throw new \InvalidArgumentException('Invalid date');
        }
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return \DateTime
     */
    public function getFirstPurchaseAt()
    {
        return $this->firstPurchaseAt;
    }

    /**
     * @param \DateTime $firstPurchaseAt
     */
    public function setFirstPurchaseAt($firstPurchaseAt)
    {
        $this->firstPurchaseAt = $firstPurchaseAt;
    }

    /**
     * @return bool
     */
    public function isCompany()
    {
        return $this->company != null ? true : false;
    }

    /**
     * @param Company $company
     */
    public function setCompany(Company $company = null)
    {
        $this->company = $company;
    }

    /**
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @return bool
     */
    public function isAgreement1()
    {
        return $this->agreement1;
    }

    /**
     * @param bool $agreement1
     */
    public function setAgreement1($agreement1)
    {
        $this->agreement1 = $agreement1;
    }

    /**
     * @return bool
     */
    public function isAgreement2()
    {
        return $this->agreement2;
    }

    /**
     * @param bool $agreement2
     */
    public function setAgreement2($agreement2)
    {
        $this->agreement2 = $agreement2;
    }

    /**
     * @return bool
     */
    public function isAgreement3()
    {
        return $this->agreement3;
    }

    /**
     * @param bool $agreement3
     */
    public function setAgreement3($agreement3)
    {
        $this->agreement3 = $agreement3;
    }
}
