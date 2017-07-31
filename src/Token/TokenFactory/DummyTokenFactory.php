<?php

namespace Webthink\GuzzleJwt\Token\TokenFactory;

use Webthink\GuzzleJwt\Token\DummyToken;

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

    public function __construct(array $payload, array $header, $signature)
    {
        $this->payload = $payload;
        $this->header = $header;
        $this->signature = $signature;
    }

    public function create($token)
    {
        return new DummyToken($token, $this->payload, $this->header, $this->signature);
    }
}
