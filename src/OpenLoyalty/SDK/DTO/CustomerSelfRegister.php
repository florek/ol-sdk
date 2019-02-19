<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\DTO;

use Assert\Assertion as Assert;
use OpenLoyalty\SDK\Model\Customer;

/**
 * Class CustomerSelfRegister
 * @package OpenLoyalty\SDK\DTO
 */
class CustomerSelfRegister
{
    /**
     * @var Customer
     */
    protected $customer;

    /**
     * @var string
     */
    protected $referralCustomerEmail;

    /**
     * @var string
     */
    protected $invitationToken;

    /**
     * @var string
     */
    protected $password;

    /**
     * CustomerSelfRegister constructor.
     * @param Customer $customer
     * @param $password
     * @param null $invitationToken
     * @param null $referralCustomerEmail
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(Customer $customer, $password, $invitationToken = null, $referralCustomerEmail = null)
    {
        $this->setCustomer($customer);
        $this->setPassword($password);
        $this->setInvitationToken($invitationToken);
        $this->setReferralCustomerEmail($referralCustomerEmail);
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     * @throws \Assert\AssertionFailedException
     */
    public function setCustomer(Customer $customer)
    {
        Assert::notEmpty($customer->getFirstName());
        Assert::notEmpty($customer->getLastName());
        Assert::notEmpty($customer->getGender());
        Assert::notEmpty($customer->getEmail());
        Assert::notEmpty($customer->isAgreement1());

        $this->customer = $customer;
    }

    /**
     * @return string
     */
    public function getReferralCustomerEmail()
    {
        return $this->referralCustomerEmail;
    }

    /**
     * @param string $referralCustomerEmail
     */
    public function setReferralCustomerEmail($referralCustomerEmail)
    {
        $this->referralCustomerEmail = $referralCustomerEmail;
    }

    /**
     * @return string
     */
    public function getInvitationToken()
    {
        return $this->invitationToken;
    }

    /**
     * @param string $invitationToken
     */
    public function setInvitationToken($invitationToken)
    {
        $this->invitationToken = $invitationToken;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param $password
     * @throws \Assert\AssertionFailedException
     */
    public function setPassword($password)
    {
        Assert::notEmpty($password);
        $this->password = $password;
    }
}
