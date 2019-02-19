<?php

require_once __DIR__ . '/../vendor/autoload.php';

use OpenLoyalty\SDK\Client;
use OpenLoyalty\SDK\Client\ApiHttpClient;
use OpenLoyalty\SDK\Model\CustomerId;

$apiClient = new Client(
    new ApiHttpClient([
        'apiUrl' => getenv('OL_URL')
    ])
);

try {
    // Authorize
    $apiClient->login('admin', 'open');

    $response = $apiClient->earningRule()->reportCustomEvent(
        'facebook_like',
        new CustomerId('00000000-0000-474c-b092-b0dd880c07e1')
    );

    print_r($response->getPoints());
} catch (\OpenLoyalty\SDK\Exception\ValidationError $e) {
    echo $e->getMessage() . PHP_EOL;
    echo $e->getResponse()->getBody();
} catch (\GuzzleHttp\Exception\ClientException $e) {
    echo $e->getMessage() . PHP_EOL;
    echo $e->getResponse()->getBody();
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e->getMessage() . PHP_EOL;
}
