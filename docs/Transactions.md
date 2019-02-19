# Transaction

## Register transaction

``` 
use OpenLoyalty\SDK\Client\ApiHttpClient;
use OpenLoyalty\SDK\Model\Sku;
use OpenLoyalty\SDK\Model\Transaction;
use OpenLoyalty\SDK\Model\TransactionItem;
use OpenLoyalty\SDK\Client;
use OpenLoyalty\SDK\Model\Customer;
use OpenLoyalty\SDK\Model\CustomerId;

$apiClient = new Client(
    new ApiHttpClient([
        'apiUrl' => 'http://example.openloyalty.io'
    ])
);

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

echo 'Registered id: ' . $transaction->getId();
```


## Simulate

``` 
use OpenLoyalty\SDK\Client\ApiHttpClient;
use OpenLoyalty\SDK\Model\Sku;
use OpenLoyalty\SDK\Model\Transaction;
use OpenLoyalty\SDK\Model\TransactionItem;
use OpenLoyalty\SDK\Client;

$apiClient = new Client(
    new ApiHttpClient([
        'apiUrl' => 'http://example.openloyalty.io'
    ])
);

// Authorize
$apiClient->login('admin', 'open');

/**
 * @var Customer $customer
 */
$customer = $apiClient->customer()->find(new CustomerId('00000000-0000-474c-b092-b0dd880c07e1'));

```

## Update customer

``` 
use OpenLoyalty\SDK\Client;
use OpenLoyalty\SDK\Client\ApiHttpClient;
use OpenLoyalty\SDK\Model\Customer;
use OpenLoyalty\SDK\Model\CustomerId;
use OpenLoyalty\SDK\DTO\TransactionSimulateResponse;

$apiClient = new Client(
    new ApiHttpClient([
        'apiUrl' => 'http://example.openloyalty.io'
    ])
);

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

/**
 * @var TransactionSimulateResponse $response
 */
$response = $apiClient->transaction()->simulate($transaction);

echo 'I will earn points: ' . $response->getPoints();
```