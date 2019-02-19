<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK;

use GuzzleHttp\Exception\ClientException;
use OpenLoyalty\SDK\Client\BaseApiClient;
use OpenLoyalty\SDK\Client\CustomerApiClient;
use OpenLoyalty\SDK\Client\EarningRuleApiClient;
use OpenLoyalty\SDK\Client\InvitationsApiClient;
use OpenLoyalty\SDK\Client\PointsApiClient;
use OpenLoyalty\SDK\Client\SettingsApiClient;
use OpenLoyalty\SDK\Client\TransactionApiClient;
use OpenLoyalty\SDK\Exception\ValidationError;

/**
 * Class Client
 * @package OpenLoyalty\SDK
 */
class Client extends BaseApiClient
{
    /**
     * @var CustomerApiClient
     */
    private $customerApiClient;

    /**
     * @var PointsApiClient
     */
    private $pointsApiClient;

    /**
     * @var TransactionApiClient
     */
    private $transactionApiClient;

    /**
     * @var SettingsApiClient
     */
    private $settingsApiClient;

    /**
     * @var InvitationsApiClient
     */
    private $invitationsApiClient;

    /**
     * @var EarningRuleApiClient
     */
    private $earningRuleApiClient;

    /**
     * @link http://open-loyalty.readthedocs.io/en/latest/api/authorization.html
     * @param $username
     * @param $password
     * @param string $userType admin|customer|seller
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function login($username, $password, $userType = self::USER_TYPE_ADMIN)
    {
        try {
            $response = $this->request('POST', sprintf('/api/%s/login_check', $userType), [
                'json' => [
                    '_username' => $username,
                    '_password' => $password,
                ]
            ]);

            $json = $this->getJson($response);
            if (isset($json['token'])) {
                $this->getApiHttpClient()->setAuthToken($json['token']);
            }
        } catch (ClientException $e) {
            throw new ValidationError('Validation error', $e->getRequest(), $e->getResponse(), $e);
        }
    }

    /**
     * @param $xAuth
     * @link http://open-loyalty.readthedocs.io/en/latest/api/authorization.html
     */
    public function xAuth($xAuth)
    {
        $this->getApiHttpClient()->setXAuth($xAuth);
    }

    /**
     * @return CustomerApiClient
     */
    public function customer()
    {
        if (null === $this->customerApiClient) {
            $this->customerApiClient = new CustomerApiClient($this->getApiHttpClient());
        }

        return $this->customerApiClient;
    }

    /**
     * @return PointsApiClient
     */
    public function points()
    {
        if (null === $this->pointsApiClient) {
            $this->pointsApiClient = new PointsApiClient($this->getApiHttpClient());
        }

        return $this->pointsApiClient;
    }

    /**
     * @return TransactionApiClient
     */
    public function transaction()
    {
        if (null === $this->transactionApiClient) {
            $this->transactionApiClient = new TransactionApiClient($this->getApiHttpClient());
        }

        return $this->transactionApiClient;
    }

    /**
     * @return DTO\SettingsResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function settings()
    {
        if (null === $this->settingsApiClient) {
            $this->settingsApiClient = new SettingsApiClient($this->getApiHttpClient());
        }

        return $this->settingsApiClient->settings();
    }

    /**
     * @return InvitationsApiClient
     */
    public function invitations()
    {
        if (null === $this->invitationsApiClient) {
            $this->invitationsApiClient = new InvitationsApiClient($this->getApiHttpClient());
        }

        return $this->invitationsApiClient;
    }

    /**
     * @return EarningRuleApiClient
     */
    public function earningRule()
    {
        if (null === $this->earningRuleApiClient) {
            $this->earningRuleApiClient = new EarningRuleApiClient($this->getApiHttpClient());
        }
        return $this->earningRuleApiClient;
    }
}
