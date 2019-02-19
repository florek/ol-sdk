# Open Loyalty PHP SDK


## Install

```
composer require divante-ltd/open-loyalty-php-sdk
```


## Example usage

``` 
use OpenLoyalty\SDK\Client;
use OpenLoyalty\SDK\Client\ApiHttpClient;

$apiClient = new Client(
    new ApiHttpClient([
        'apiUrl' => 'http://example.openloyalty.io'
    ])
);

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

## SDK Documentation

- [Authorization](docs/Auth.md)
- [Customer](docs/Customer.md)
- [Earning rules](docs/EarningRules.md)
- [Invitations](docs/Invitations.md)
- [Points](docs/Points.md)
- [Transactions](docs/Transactions.md)
- [Settings](docs/Settings.md)

## Read more

[Open Loyalty REST API Reference](http://open-loyalty.readthedocs.io/en/latest/api/index.html)