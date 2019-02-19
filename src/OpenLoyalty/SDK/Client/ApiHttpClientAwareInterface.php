<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Client;

/**
 * Interface ApiHttpClientAwareInterface
 * @package OpenLoyalty\SDK\Client
 */
interface ApiHttpClientAwareInterface
{
    /**
     * @param ApiHttpClientInterface $apiHttpClient
     * @return mixed
     */
    public function setApiHttpClient(ApiHttpClientInterface $apiHttpClient);
}
