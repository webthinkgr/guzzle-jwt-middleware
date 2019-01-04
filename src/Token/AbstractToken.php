<?php

declare(strict_types=1);

namespace Webthink\GuzzleJwt\Token;

use Webthink\GuzzleJwt\Encoder\Base64Encoder;
use Webthink\GuzzleJwt\Encoder\EncoderInterface;
use Webthink\GuzzleJwt\TokenInterface;

/**
 * @author George Mponos <gmponos@gmail.com>
 */
abstract class AbstractToken implements TokenInterface
{
    /**
     * @var string
     */
    protected $token;

    /**
     * @var array
     */
    protected $header;

    /**
     * @var array
     */
    protected $payload;

    /**
     * @var string
     */
    protected $signature;

    /**
     * @var EncoderInterface
     */
    protected $encoder;

    /**
     * @param string $token
     * @param \Webthink\GuzzleJwt\Encoder\EncoderInterface|null $encoder
     * @throws \InvalidArgumentException
     */
    public function __construct(string $token, EncoderInterface $encoder = null)
    {
        $this->encoder = ($encoder === null ? new Base64Encoder() : $encoder);
        list($header, $payload, $signature) = $this->parse($token);

        $this->token = $token;
        $this->header = $header;
        $this->payload = $payload;
        $this->signature = $signature;
    }

    /**
     * @return array
     */
    public function getPayload(): array
    {
        return $this->payload;
    }

    /**
     * @return array
     */
    public function getHeader(): array
    {
        return $this->header;
    }

    /**
     * @return string
     */
    public function getSignature(): string
    {
        return $this->signature;
    }

    /**
     * @return string
     */
    public function getTokenString(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     * @return array
     * @throws \InvalidArgumentException
     */
    protected function parse(string $token): array
    {
        $parts = explode('.', $token);
        if (count($parts) !== 3) {
            throw new \InvalidArgumentException('Token form is invalid');
        }

        $header = json_decode($this->encoder->decode($parts[0]), true);
        $payload = json_decode($this->encoder->decode($parts[1]), true);
        $signature = $parts[2];
        return [$header, $payload, $signature];
    }
}
