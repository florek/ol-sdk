<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Client;

use OpenLoyalty\SDK\Deserializer\DeserializerFactory;
use OpenLoyalty\SDK\Deserializer\DeserializerFactoryAware;
use OpenLoyalty\SDK\Deserializer\DeserializerFactoryInterface;
use OpenLoyalty\SDK\Exception\JsonParseError;
use OpenLoyalty\SDK\Serializer\SerializerFactory;
use OpenLoyalty\SDK\Serializer\SerializerFactoryAware;
use OpenLoyalty\SDK\Serializer\SerializerFactoryInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class BaseApiClient
 * @package OpenLoyalty\SDK\Client
 */
abstract class BaseApiClient implements ApiHttpClientAwareInterface, SerializerFactoryAware, DeserializerFactoryAware
{
    /**
     * @var ApiHttpClientInterface
     */
    protected $apiHttpClient;

    /**
     * @var SerializerFactoryInterface
     */
    private $serializerFactory;

    /**
     * @var DeserializerFactoryInterface
     */
    private $deserializerFactory;

    const USER_TYPE_ADMIN = 'admin';
    const USER_TYPE_CUSTOMER = 'customer';
    const USER_TYPE_SELLER = 'seller';

    /**
     * BaseApiClient constructor.
     * @param ApiHttpClientInterface $apiHttpClient
     */
    public function __construct(ApiHttpClientInterface $apiHttpClient)
    {
        $this->setApiHttpClient($apiHttpClient);
    }

    /**
     * @param ApiHttpClientInterface $apiHttpClient
     * @return mixed
     */
    public function setApiHttpClient(ApiHttpClientInterface $apiHttpClient)
    {
        $this->apiHttpClient = $apiHttpClient;
    }

    /**
     * @return ApiHttpClientInterface
     */
    public function getApiHttpClient(): ApiHttpClientInterface
    {
        return $this->apiHttpClient;
    }

    /**
     * @param $method
     * @param $uri
     * @param array $data
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function requestForm($method, $uri, array $data)
    {
        return $this->request($method, $uri, [
            'headers' => [
                'Content-type' => 'application/x-www-form-urlencoded'
            ],
            'body' => urldecode(http_build_query($data))
        ]);
    }

    /**
     * @param $method
     * @param $uri
     * @param array $options
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function request($method, $uri, array $options = [])
    {
        $defaults = [
            'Accept' => 'application/json',
        ];

        return $this
            ->getApiHttpClient()
            ->getHttpClient()
            ->request($method, $uri, array_merge($defaults, $options));
    }

    /**
     * @param ResponseInterface $response
     * @return array
     * @throws JsonParseError
     */
    protected function getJson(ResponseInterface $response)
    {
        $json = json_decode($response->getBody(), true);
        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new JsonParseError(json_last_error_msg(), $response);
        }

        return $json;
    }

    /**
     * @param SerializerFactoryInterface $serializerFactory
     * @return void
     */
    public function setSerializerFactory(SerializerFactoryInterface $serializerFactory)
    {
        $this->serializerFactory = $serializerFactory;
    }

    /**
     * @return SerializerFactoryInterface
     */
    public function getSerializerFactory(): SerializerFactoryInterface
    {
        if (null === $this->serializerFactory) {
            $this->setSerializerFactory(new SerializerFactory());
        }
        return $this->serializerFactory;
    }

    /**
     * @param DeserializerFactoryInterface $deserializerFactory
     * @return mixed|void
     */
    public function setDeserializerFactory(DeserializerFactoryInterface $deserializerFactory)
    {
        $this->deserializerFactory = $deserializerFactory;
    }

    /**
     * @return DeserializerFactoryInterface
     */
    public function getDeserializerFactory(): DeserializerFactoryInterface
    {
        if (null === $this->deserializerFactory) {
            $this->setDeserializerFactory(new DeserializerFactory());
        }
        return $this->deserializerFactory;
    }
}
