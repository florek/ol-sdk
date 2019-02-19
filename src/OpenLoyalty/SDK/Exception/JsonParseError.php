<?php
/**
 * Copyright © 2018 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace OpenLoyalty\SDK\Exception;

use Psr\Http\Message\ResponseInterface;
use Throwable;
use RuntimeException;

/**
 * Class JsonParseError
 * @package OpenLoyalty\SDK\Exception
 */
class JsonParseError extends RuntimeException
{
    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * InvalidJsonException constructor.
     * @param string $message
     * @param ResponseInterface $response
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = "", ResponseInterface $response, int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->response = $response;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
