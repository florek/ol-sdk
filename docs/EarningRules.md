# Earning Rule

## Report custom event

``` 
use OpenLoyalty\SDK\Client;
use OpenLoyalty\SDK\Client\ApiHttpClient;
use OpenLoyalty\SDK\Model\CustomerId;
use OpenLoyalty\SDK\DTO\CustomEventResponse;

$apiClient = new Client(
    new ApiHttpClient([
        'apiUrl' => 'http://example.openloyalty.io'
    ])
);

// Authorize
$apiClient->login('admin', 'open');

/**
 * @var CustomEventResponse $response
 */
$response = $apiClient->earningRule()->reportCustomEvent(
    'facebook_like',
    new CustomerId('00000000-0000-474c-b092-b0dd880c07e1')
);

echo 'Earned points: ' . $response->getPoints();
```
