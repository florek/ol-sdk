<?php

require_once __DIR__ . '/../vendor/autoload.php';

use OpenLoyalty\SDK\Client\ApiHttpClient;
use OpenLoyalty\SDK\Client;

$apiClient = new Client(
    new ApiHttpClient([
        'apiUrl' => getenv('OL_URL')
    ])
);

try {
    // Authorize
    $apiClient->login('admin', 'open');

    $response = $apiClient->settings();

    echo $response->getProgramPointsSingular();
} catch (Exception $e) {
    echo $e->getMessage();
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e->getMessage();
}
