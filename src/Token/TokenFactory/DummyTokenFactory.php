<?php

namespace Webthink\GuzzleJwt\Token\TokenFactory;

use Webthink\GuzzleJwt\Token\DummyToken;

/**
 * @author George Mponos <gmponos@xm.com>
 */
class DummyTokenFactory implements TokenFactoryInterface
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
     * DummyTokenFactory constructor.
     *
     * @param array $payload
     * @param array $header
     * @param string $signature
     */
    public function __construct(array $payload, array $header, $signature)
    {
        $this->payload = $payload;
        $this->header = $header;
        $this->signature = $signature;
    }

    /**
     * @param string $token
     * @return \Webthink\GuzzleJwt\Token\DummyToken
     */
    public function create($token)
    {
        return new DummyToken($token, $this->payload, $this->header, $this->signature);
    }
}
