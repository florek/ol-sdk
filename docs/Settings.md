# Settings

## Get settings

``` 
use OpenLoyalty\SDK\Client\ApiHttpClient;
use OpenLoyalty\SDK\Client;
use OpenLoyalty\SDK\DTO\SettingsResponse;

$apiClient = new Client(
    new ApiHttpClient([
        'apiUrl' => 'http://example.openloyalty.io'
    ])
);

// Authorize
$apiClient->login('admin', 'open');
 
/**
 * @var SettingsResponse $settings
 */
$settings = $apiClient->settings();
```