# Invitations

## Invite

``` 
use OpenLoyalty\SDK\Client;
use OpenLoyalty\SDK\Client\ApiHttpClient;

$apiClient = new Client(
    new ApiHttpClient([
        'apiUrl' => 'http://example.openloyalty.io'
    ])
);

// Authorize
$apiClient->login('user@oloy.com', 'loyalty', Client::USER_TYPE_CUSTOMER);

/**
 * @var boolean $results
 */
$results = $apiClient->invitations()->invite('friend@example.com');

echo ($results) ? 'Invited' : 'Not invited';
```

## Invitations list

``` 
use OpenLoyalty\SDK\Client;
use OpenLoyalty\SDK\Client\ApiHttpClient;
use OpenLoyalty\SDK\Model\Invitation;
use OpenLoyalty\SDK\DTO\InvitationsQuery;
use OpenLoyalty\SDK\Model\CustomerId;

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
$query = new InvitationsQuery([
    'page' => 1,
    'perPage' => 15,
    'referrerId' => new CustomerId('...'),
    'referrerEmail' => '...',
    'referrerName' => '...',
    'recipientId' => new CustomerId('...'),
    'recipientEmail' => 'example2@domain.com',
    'recipientName' => '...',
    'status' => InvitationsQuery::STATUS_INVITED
]);
 
/**
 * @var Invitation[] $invitations
 */
$invitations = $apiClient->invitations()->list($query);

foreach ($invitations as $invitation) {
    // ...
}
```