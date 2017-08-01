<?php

namespace Webthink\GuzzleJwt\Exception;

use Exception;
use GuzzleHttp\Exception\BadResponseException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class TokenRequestException extends BadResponseException
{
    /**
     * TokenRequestException constructor.
     *
     * @param string $message
     * @param \Psr\Http\Message\RequestInterface $request
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param \Exception|null $previous
     * @param array $handlerContext
     */
    public function __construct(
        $message,
        RequestInterface $request,
        ResponseInterface $response,
        Exception $previous = null,
        array $handlerContext = []
    ) {
        parent::__construct($message, $request, $response, $previous, $handlerContext);
    }
}