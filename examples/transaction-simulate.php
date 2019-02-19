<?php

require_once __DIR__ . '/../vendor/autoload.php';

use OpenLoyalty\SDK\Client\ApiHttpClient;
use OpenLoyalty\SDK\Model\Sku;
use OpenLoyalty\SDK\Model\Transaction;
use OpenLoyalty\SDK\Model\TransactionItem;
use OpenLoyalty\SDK\Client;

$apiClient = new Client(
    new ApiHttpClient([
        'apiUrl' => getenv('OL_URL')
    ])
);

try {
    // Authorize
    $apiClient->login('admin', 'open');

    $items = [
        new TransactionItem(
            new Sku('SKU1'),
            'item 1',
            1,
            1,
            'test'

        ),
        new TransactionItem(
            new Sku('SKU2'),
            'item 1',
            1,
            11,
            'test'

        )
    ];

    $transaction = new Transaction($items, new DateTime());
    $response = $apiClient->transaction()->simulate($transaction);

    echo $response->getPoints();
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e->getMessage();
}
