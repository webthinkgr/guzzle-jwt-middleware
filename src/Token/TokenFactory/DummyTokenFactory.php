<?php

declare(strict_types=1);

namespace Webthink\GuzzleJwt\Token\TokenFactory;

use Webthink\GuzzleJwt\Token\DummyToken;
use Webthink\GuzzleJwt\TokenInterface;

/**
 * @author George Mponos <gmponos@gmail.com>
 */
final class DummyTokenFactory implements TokenFactoryInterface
{
    /**
     * @var array
     */
    private $payload;

    /**
     * @var array
     */
    private $header;

    /**
     * @var string
     */
    private $signature;

    /**
     * @param array $payload
     * @param array $header
     * @param string $signature
     */
    public function __construct(array $payload, array $header, string $signature)
    {
        $this->payload = $payload;
        $this->header = $header;
        $this->signature = $signature;
    }

    /**
     * @param string $token
     * @return \Webthink\GuzzleJwt\Token\DummyToken
     */
    public function create(string $token): TokenInterface
    {
        return new DummyToken($token, $this->payload, $this->header, $this->signature);
    }
}
