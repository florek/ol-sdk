<?php

require_once __DIR__ . '/../vendor/autoload.php';

use OpenLoyalty\SDK\Client\ApiHttpClient;
use OpenLoyalty\SDK\Model\Sku;
use OpenLoyalty\SDK\Model\Transaction;
use OpenLoyalty\SDK\Model\TransactionItem;
use OpenLoyalty\SDK\Client;
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

    $customer = new Customer();
    $customer->setId(new CustomerId('00000000-0000-474c-b092-b0dd880c07e1'));
    $customer->setFirstName('John');
    $customer->setLastName('Doe');

    $transaction->setCustomer($customer);
    $transaction->setDocumentNumber('Example001');
    $transaction->setDocumentType(Transaction::TYPE_SELL);

    $apiClient->transaction()->register($transaction);
} catch (\Assert\AssertionFailedException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e->getMessage();
}
