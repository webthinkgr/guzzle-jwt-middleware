<?php

namespace Webthink\GuzzleJwt\Exception;

use Exception;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class TokenRequestException
 *
 * @author George Mponos <gmponos@gmail.com>
 */
class BadTokenRequestException extends RequestException
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
