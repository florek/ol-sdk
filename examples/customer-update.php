<?php

require_once __DIR__ . '/../vendor/autoload.php';

use OpenLoyalty\SDK\Client;
use OpenLoyalty\SDK\Client\ApiHttpClient;
use OpenLoyalty\SDK\Model\Customer;
use OpenLoyalty\SDK\Model\CustomerId;

$apiClient = new Client(
    new ApiHttpClient([
        'apiUrl' => getenv('OL_URL')
    ])
);

try {
    // Authorize
    $apiClient->login('admin', 'open');

    $customer = new Customer();
    $customer->setId(new CustomerId('00000000-0000-474c-b092-b0dd880c07e1'));
    $customer->setFirstName('John');
    $customer->setLastName('Doe');
    $customer->setEmail('john@exampl2e.com');
    $customer->setAgreement1(1);
    $customer->setLoyaltyCardNumber('1123123');

    $response = $apiClient->customer()->update($customer);

    echo sprintf('Registered Id "%s"', (string)$response->getId());
} catch (\Assert\AssertionFailedException $e) {
    echo $e->getMessage();
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e->getMessage();
}
