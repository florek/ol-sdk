<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Deserializer;

use OpenLoyalty\SDK\Model\Invitation;

/**
 * Interface InvitationDeserializerInterface
 * @package OpenLoyalty\SDK\Deserializer
 */
interface InvitationDeserializerInterface
{
    /**
     * @param array $data
     * @return Invitation
     */
    public function deserialize(array $data): Invitation;
}
