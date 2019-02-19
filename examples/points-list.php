<?php

require_once __DIR__ . '/../vendor/autoload.php';

use OpenLoyalty\SDK\Client\ApiHttpClient;
use OpenLoyalty\SDK\DTO\PointsQuery;
use OpenLoyalty\SDK\Model\CustomerId;
use OpenLoyalty\SDK\Client;

$apiClient = new Client(
    new ApiHttpClient([
        'apiUrl' => getenv('OL_URL')
    ])
);

try {
    // Authorize
    $apiClient->login('admin', 'open');

    $transfers = $apiClient->points()->list(new PointsQuery([
        'customerId' => new CustomerId('00000000-0000-474c-b092-b0dd880c07e1')
    ]));

    print_r($transfers);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e->getMessage();
} catch (\Assert\AssertionFailedException $e) {
    echo $e->getMessage();
}
