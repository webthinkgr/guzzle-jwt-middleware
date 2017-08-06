<?php

namespace Webthink\GuzzleJwt\Token;

use Webthink\GuzzleJwt\TokenInterface;

/**
 * @author George Mponos <gmponos@xm.com>
 */
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

    /**
     * DummyToken constructor.
     *
     * @param string $token
     * @param array $payload
     * @param array $header
     * @param string $signature
     */
    public function __construct($token, array $payload, array $header, $signature)
    {
        $this->payload = $payload;
        $this->header = $header;
        $this->signature = $signature;
        $this->token = $token;
    }

    /**
     * @inheritdoc
     */
    public function getTokenString()
    {
        return $this->token;
    }

    /**
     * @inheritdoc
     */
    public function isValid()
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @inheritdoc
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @inheritdoc
     */
    public function getSignature()
    {
        return $this->signature;
    }
}
