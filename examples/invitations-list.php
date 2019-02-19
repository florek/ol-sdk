<?php

require_once __DIR__ . '/../vendor/autoload.php';

use OpenLoyalty\SDK\Client;
use OpenLoyalty\SDK\Client\ApiHttpClient;

$apiClient = new Client(
    new ApiHttpClient([
        'apiUrl' => getenv('OL_URL')
    ])
);

try {
    // Authorize
    //$apiClient->login('user@oloy.com', 'loyalty', Client::USER_TYPE_CUSTOMER);
    $apiClient->login('admin', 'open');

    $invitations = $apiClient->invitations()->list();

    print_r($invitations);
} catch (\OpenLoyalty\SDK\Exception\ValidationError $e) {

    echo $e->getMessage() . PHP_EOL;
    echo $e->getResponse()->getBody();
} catch (\GuzzleHttp\Exception\ClientException $e) {
    echo $e->getMessage() . PHP_EOL;
    echo $e->getResponse()->getBody();
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e->getMessage() . PHP_EOL;
    print_r($e);
}
