<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Client;

use OpenLoyalty\SDK\DTO\PointsQuery;
use OpenLoyalty\SDK\Model\PointsTransfer;

/**
 * Class PointsApiClient
 * @package OpenLoyalty\SDK\Client
 */
class PointsApiClient extends BaseApiClient
{
    /**
     * @param PointsQuery|null $query
     * @return PointsTransfer[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function list(PointsQuery $query = null)
    {
        if (null === $query) {
            $query = new PointsQuery();
        }

        $response = $this->requestForm('GET', '/api/points/transfer', [
            'query' => array_filter([
                'page' => $query->getPage(),
                'perPage' => $query->getPerPage(),
                'sort' => $query->getSort(),
                'direction' => $query->getDirection(),
                'customerId' => $query->getCustomerId(),
                'customerEmail' => $query->getCustomerEmail(),
                'customerPhone' => $query->getCustomerPhone(),
                'customerLastName' => $query->getCustomerLastName(),
                'customerFirstName' => $query->getCustomerFirstName(),
                'state' => $query->getState(),
                'type' => $query->getType()
            ])
        ]);

        $transfers = [];
        $json = $this->getJson($response);
        if (isset($json['transfers'])) {
            foreach ($json['transfers'] as $transfer) {
                $transfers[] = $this->getDeserializerFactory()->getPointsTransferDeserializer()->deserialize($transfer);
            }
        }

        return $transfers;
    }
}
