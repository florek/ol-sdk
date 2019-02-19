<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Client;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

/**
 * Class ApiHttpClient
 * @package OpenLoyalty\SDK\Client
 */
class ApiHttpClient implements ApiHttpClientInterface
{
    /**
     * @var array
     */
    protected $httpClientConfig;

    /**
     * @var string
     */
    protected $apiUrl = '';

    /**
     * <code>
     *   ['username','password']
     * </code>
     * @var array|null
     */
    protected $basicAuth;

    /**
     * @var string
     */
    protected $authToken;

    /**
     * @var string
     */
    protected $xAuth;

    /**
     * @var string
     */
    protected $version = '1.0';

    /**
     * BaseApiClient constructor.
     * @param array $params
     * @param array $httpClientConfig
     */
    public function __construct(array $params = [], array $httpClientConfig = [])
    {
        if (!empty($params)) {
            foreach ($params as $k => $v) {
                switch ($k) {
                    case 'apiUrl':
                        $this->setApiUrl($v);
                        break;
                    case 'authToken':
                        $this->setAuthToken($v);
                        break;
                    case 'xAuth':
                        $this->setXAuth($v);
                        break;
                    case 'basicAuth':
                        $this->setBasicAuth($v);
                        break;
                    case 'version':
                        $this->setVersion($v);
                        break;
                }
            }
        }

        $this->setHttpClientConfig($httpClientConfig);
    }

    /**
     * @return string
     */
    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    /**
     * @param string $apiUrl
     */
    public function setApiUrl(string $apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    /**
     * @return array|null
     */
    public function getBasicAuth(): array
    {
        return $this->basicAuth;
    }

    /**
     * @param array|null $basicAuth
     */
    public function setBasicAuth(array $basicAuth)
    {
        $this->basicAuth = $basicAuth;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $version
     */
    public function setVersion(string $version)
    {
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getAuthToken(): string
    {
        return $this->authToken;
    }

    /**
     * @param string $authToken
     * @link http://open-loyalty.readthedocs.io/en/latest/api/authorization.html
     */
    public function setAuthToken(string $authToken)
    {
        $this->authToken = $authToken;
    }

    /**
     * @return string
     */
    public function getXAuth(): string
    {
        return $this->xAuth;
    }

    /**
     * @param string $xAuth
     * @link http://open-loyalty.readthedocs.io/en/latest/api/authorization.html
     */
    public function setXAuth(string $xAuth)
    {
        $this->xAuth = $xAuth;
    }

    /**
     * @param array $httpClientConfig
     */
    public function setHttpClientConfig(array $httpClientConfig)
    {
        $this->httpClientConfig = $httpClientConfig;
    }

    /**
     * @return array
     */
    public function getHttpClientConfig()
    {
        $config = [
            'headers' => [
                'Content-type' => 'application/json',
                'X-Api-Version' => $this->getVersion(),
                'User-Agent'    => 'OpenLoyalty SDK API Client ' . $this->getVersion()
            ]
        ];

        if (!empty($this->authToken)) {
            $config['headers']['Authorization'] = 'Bearer '. $this->getAuthToken();
        }

        if (!empty($this->xAuth)) {
            $config['headers']['X-AUTH-TOKEN'] = $this->getXAuth();
        }

        if (null !== $this->basicAuth) {
            $config['auth'] = $this->basicAuth;
        }

        if (!empty($this->apiUrl)) {
            $config['base_uri'] = $this->apiUrl;
        }

        return array_replace_recursive($config, $this->httpClientConfig);
    }

    /**
     * @return ClientInterface
     */
    public function getHttpClient() : ClientInterface
    {
        return new Client($this->getHttpClientConfig());
    }
}
