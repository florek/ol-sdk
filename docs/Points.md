# Points transfers

## Invite

## Points list

``` 
use OpenLoyalty\SDK\Client\ApiHttpClient;
use OpenLoyalty\SDK\DTO\PointsQuery;
use OpenLoyalty\SDK\Model\CustomerId;
use OpenLoyalty\SDK\Client;
use OpenLoyalty\SDK\Model\PointsTransfer;

$apiClient = new Client(
    new ApiHttpClient([
        'apiUrl' => 'http://example.openloyalty.io'
    ])
);

// Authorize
$apiClient->login('admin', 'open');

/**
 * @var InvitationsQuery $query
 */
$query = new PointsQuery([
    'page' => 1,
    'perPage' => 15,
    'customerId' => new CustomerId('...'),,
    'customerEmail' => '...',
    'customerPhone' => '...',
    'customerLastName' => '...',
    'customerFirstName' => '...',
    'state' => '...',
    'type' => '...'
]);
 
/**
 * @var PointsTransfer[] $transfers
 */
$transfers = $apiClient->points()->list($query);

foreach ($transfers as $transfer) {
    // ...
}
```