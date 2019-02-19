<?php

require_once __DIR__ . '/../vendor/autoload.php';

use OpenLoyalty\SDK\Client;
use OpenLoyalty\SDK\Client\ApiHttpClient;

/**
 * @link http://open-loyalty.readthedocs.io/en/latest/api/authorization.html
 */

/*
 * SOLUTION no. 1
 */

// Create  client (unauthorized)
$apiClient = new Client(
    new ApiHttpClient([
        'apiUrl' => getenv('OL_URL')
    ])
);

try {
    // Authorize via password and login
    $apiClient->login('admin', 'open');

    // or authorize via permanent token
    $apiClient->xAuth('MbWDlVeJFBP9JAm8av9ue8RTxtBK3YJl......');

    // .. do stuff
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo $e->getMessage() . PHP_EOL . $e->getTraceAsString();
}


/*
 * SOLUTION no. 2
 */

// Create  client (authorized)
$apiClient = new Client(
    new ApiHttpClient([
        'apiUrl' => getenv('OL_URL'),
        'xAuth' => 'MbWDlVeJFBP9JAm8av9ue8RTxtBK3YJl......'
    ])
);

// .. do stuff
