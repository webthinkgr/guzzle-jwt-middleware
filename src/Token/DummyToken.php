<?php

namespace Webthink\GuzzleJwt\Token;

use Webthink\GuzzleJwt\TokenInterface;

class DummyToken implements TokenInterface
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
     * @var string
     */
    private $token;

    public function __construct($token, array $payload, array $header, $signature)
    {
        $this->payload = $payload;
        $this->header = $header;
        $this->signature = $signature;
        $this->token = $token;
    }

    public function getTokenString()
    {
        $this->token;
    }

    public function isValid()
    {
        return true;
    }

    public function getPayload()
    {
        return $this->payload;
    }

    public function getHeader()
    {
        return $this->header;
    }

    public function getSignature()
    {
        return $this->signature;
    }
}
