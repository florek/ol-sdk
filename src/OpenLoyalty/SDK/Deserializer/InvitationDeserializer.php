<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Deserializer;

use OpenLoyalty\SDK\Model\Invitation;

/**
 * Class InvitationDeserializer
 * @package OpenLoyalty\SDK\Deserializer
 */
class InvitationDeserializer extends AbstractDeserializer implements InvitationDeserializerInterface
{
    /**
     * @param array $data
     * @return Invitation
     */
    public function deserialize(array $data): Invitation
    {
        $invitation = new Invitation();

        foreach ($data as $key => $val) {
            $this->set($invitation, $key, $val);
        }

        return $invitation;
    }
}
