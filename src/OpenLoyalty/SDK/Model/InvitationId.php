<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */
namespace OpenLoyalty\SDK\Model;

use Assert\Assertion as Assert;

/**
 * Class InvitationId
 * @package OpenLoyalty\SDK\Model
 */
class InvitationId
{
    /**
     * @var string
     */
    private $invitationId;

    /**
     * InvitationId constructor.
     * @param $invitationId
     * @throws \Assert\AssertionFailedException
     */
    public function __construct($invitationId)
    {
        Assert::string($invitationId);
        Assert::uuid($invitationId);

        $this->invitationId = $invitationId;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->invitationId;
    }
}
