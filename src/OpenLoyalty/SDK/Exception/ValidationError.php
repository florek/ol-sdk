<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Exception;

use GuzzleHttp\Exception\BadResponseException;

/**
 * Class ValidationError
 * @package OpenLoyalty\SDK\Exception
 */
class ValidationError extends BadResponseException
{
    /**
     * @var array
     */
    private $validationErrors;

    /**
     * @return array
     */
    public function getValidationErrors(): array
    {
        if (null === $this->validationErrors) {
            $this->validationErrors = [];

            if (null !== $this->getResponse()) {
                $json = json_decode($this->getResponse()->getBody(), true);
                if (JSON_ERROR_NONE == json_last_error()) {
                    $this->validationErrors = $json;
                }
            }
        }

        return $this->validationErrors;
    }
}
