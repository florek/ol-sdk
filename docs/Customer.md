# Customer

## Register customer

``` 
use OpenLoyalty\SDK\Client;
use OpenLoyalty\SDK\Client\ApiHttpClient;
use OpenLoyalty\SDK\Model\Customer;
use OpenLoyalty\SDK\Model\CustomerId;

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
$customer = new Customer();
$customer->setFirstName('John');
$customer->setLastName('Doe');
$customer->setEmail('john@example.com');
$customer->setPhone('534869620');
$customer->setAgreement1(1);

$apiClient->customer()->register($customer);

echo 'Customer Id: ' . (string)$customer->getId();
```


## Get customer model

``` 
use OpenLoyalty\SDK\Client;
use OpenLoyalty\SDK\Client\ApiHttpClient;
use OpenLoyalty\SDK\Model\Customer;
use OpenLoyalty\SDK\Model\CustomerId;

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
$customer = new Customer();
$customer->setId(new CustomerId('00000000-0000-474c-b092-b0dd880c07e1'));
$customer->setFirstName('John');
$customer->setLastName('Doe');
$customer->setEmail('john@exampl2e.com');
$customer->setAgreement1(1);
$customer->setLoyaltyCardNumber('1123123');

$updatedCustomer = $apiClient->customer()->update($customer);

echo 'Updated at: ' . $updatedCustomer->getUpdatedAt()->format(\DateTime::ATOM);
```