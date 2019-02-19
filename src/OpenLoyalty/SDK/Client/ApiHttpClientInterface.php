<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Client;

use GuzzleHttp\ClientInterface;

/**
 * Interface ApiHttpClientInterface
 * @package OpenLoyalty\SDK\Client
 */
interface ApiHttpClientInterface
{
    /**
     * @return ClientInterface
     */
    public function getHttpClient() : ClientInterface;

    /**
     * @param string $apiUrl
     */
    public function setApiUrl(string $apiUrl);

    /**
     * @param array|null $basicAuth
     */
    public function setBasicAuth(array $basicAuth);

    /**
     * @param string $authToken
     * @link http://open-loyalty.readthedocs.io/en/latest/api/authorization.html
     */
    public function setAuthToken(string $authToken);

    /**
     * @param string $xAuth
     * @link http://open-loyalty.readthedocs.io/en/latest/api/authorization.html
     */
    public function setXAuth(string $xAuth);

    /**
     * @param array $httpClientConfig
     */
    public function setHttpClientConfig(array $httpClientConfig);
}
