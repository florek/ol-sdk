# Authorization

## Admin login

``` 
use OpenLoyalty\SDK\Client;
use OpenLoyalty\SDK\Client\ApiHttpClient;

$apiClient = new Client(
    new ApiHttpClient([
        'apiUrl' => 'http://example.openloyalty.io'
    ])
);

$apiClient->login('admin', 'open');

```

## Customer login


``` 
use OpenLoyalty\SDK\Client;
use OpenLoyalty\SDK\Client\ApiHttpClient;

$apiClient = new Client(
    new ApiHttpClient([
        'apiUrl' => 'http://example.openloyalty.io'
    ])
);

$apiClient->login('user@oloy.com', 'loyalty', Client::USER_TYPE_CUSTOMER);
```

## XAuth token login


``` 
use OpenLoyalty\SDK\Client;
use OpenLoyalty\SDK\Client\ApiHttpClient;

$apiClient = new Client(
    new ApiHttpClient([
        'apiUrl' => 'http://example.openloyalty.io'
    ])
);

$apiClient->xAuth('MbWDlVeJFBP9JAm8av9ue8RTxtBK3YJl......');
```