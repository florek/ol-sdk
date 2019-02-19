<?php

require_once __DIR__ . '/../vendor/autoload.php';

use OpenLoyalty\SDK\Client;
use OpenLoyalty\SDK\Client\ApiHttpClient;
use OpenLoyalty\SDK\Model\Customer;
use OpenLoyalty\SDK\Exception\ValidationError;

$apiClient = new Client(
    new ApiHttpClient([
        'apiUrl' => getenv('OL_URL')
    ])
);

try {
    // Authorize
    $apiClient->login('admin', 'open');

    $customer = new Customer();

    $customer->setFirstName('John');
    $customer->setLastName('Doe');
    $customer->setEmail('john@example.com');
    $customer->setPhone('534869620');
    $customer->setAgreement1(1);

    $response = $apiClient->customer()->register($customer);

    echo sprintf('Registered Id "%s"', (string)$response->getId());
} catch (ValidationError $e) {
    print_r($e->getValidationErrors());
} catch (\Assert\AssertionFailedException $e) {
    echo $e->getMessage();
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e->getMessage();
}
