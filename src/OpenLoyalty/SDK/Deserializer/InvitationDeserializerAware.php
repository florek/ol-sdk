<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Deserializer;

/**
 * Interface InvitationDeserializerAware
 * @package OpenLoyalty\SDK\Deserializer
 */
interface InvitationDeserializerAware
{
    /**
     * @param InvitationDeserializerInterface $invitationDeserializer
     * @return mixed
     */
    public function setInvitationDeserializer(InvitationDeserializerInterface $invitationDeserializer);
}
