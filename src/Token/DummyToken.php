<?php

declare(strict_types=1);

namespace Webthink\GuzzleJwt\Token;

use Webthink\GuzzleJwt\TokenInterface;

/**
 * This is a token that you will retrieve from it what you passed on it's construction.
 * Mainly the use of this token class is for testing purposes.
 *
 * @author George Mponos <gmponos@gmail.com>
 */
final class DummyToken implements TokenInterface
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

    public function __construct(string $token, array $payload, array $header, string $signature)
    {
        $this->payload = $payload;
        $this->header = $header;
        $this->signature = $signature;
        $this->token = $token;
    }

    public function getTokenString(): string
    {
        return $this->token;
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getPayload(): array
    {
        return $this->payload;
    }

    public function getHeader(): array
    {
        return $this->header;
    }

    public function getSignature(): string
    {
        return $this->signature;
    }
}
