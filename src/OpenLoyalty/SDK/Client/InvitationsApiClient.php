<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Client;

use GuzzleHttp\Exception\ClientException;
use OpenLoyalty\SDK\DTO\InvitationsQuery;
use OpenLoyalty\SDK\Exception\ValidationError;
use OpenLoyalty\SDK\Model\Invitation;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class InvitationsApiClient
 * @package OpenLoyalty\SDK\Client
 */
class InvitationsApiClient extends BaseApiClient
{
    /**
     * @param InvitationsQuery $query
     * @return Invitation[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list(InvitationsQuery $query = null)
    {
        if (null === $query) {
            $query = new InvitationsQuery();
        }

        $response = $this->request('GET', '/api/invitations', [
            'query' => array_filter([
                'page' => $query->getPage(),
                'perPage' => $query->getPerPage(),
                'sort' => $query->getSort(),
                'direction' => $query->getDirection(),
                'referrerId' => $query->getReferrerId(),
                'referrerEmail' => $query->getReferrerEmail(),
                'referrerName' => $query->getReferrerName(),
                'recipientId' => $query->getRecipientId(),
                'recipientEmail' => $query->getRecipientEmail(),
                'recipientName' => $query->getRecipientName(),
                'status' => $query->getStatus()
            ])
        ]);

        $invitations = [];
        $json = $this->getJson($response);
        if (isset($json['invitations'])) {
            foreach ($json['invitations'] as $invitation) {
                $invitations[] = $this->getDeserializerFactory()->getInvitationDeserializer()->deserialize($invitation);
            }
        }

        return $invitations;
    }

    /**
     * @param string $recipientEmail
     * @return bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws ValidationError
     */
    public function invite(string $recipientEmail)
    {
        try {
            $response = $this->requestForm('POST', '/api/invitations/invite', [
                'invitation' => ['recipientEmail' => $recipientEmail]
            ]);

            return $response->getStatusCode() === Response::HTTP_OK;
        } catch (ClientException $e) {
            throw new ValidationError('Validation error', $e->getRequest(), $e->getResponse(), $e);
        }
    }
}
