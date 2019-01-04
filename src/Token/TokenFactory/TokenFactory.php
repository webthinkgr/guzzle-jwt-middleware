<?php

declare(strict_types=1);

namespace Webthink\GuzzleJwt\Token\TokenFactory;

use Webthink\GuzzleJwt\Encoder\Base64Encoder;
use Webthink\GuzzleJwt\Encoder\EncoderInterface;
use Webthink\GuzzleJwt\Token\Token;
use Webthink\GuzzleJwt\TokenInterface;

/**
 * @author George Mponos <gmponos@gmail.com>
 */
final class TokenFactory implements TokenFactoryInterface
{
    /**
     * @var EncoderInterface
     */
    private $encoder;

    /**
     * TokenFactory constructor.
     *
     * @param \Webthink\GuzzleJwt\Encoder\EncoderInterface $encoder
     */
    public function __construct(EncoderInterface $encoder = null)
    {
        $this->encoder = $encoder === null ? new Base64Encoder() : $encoder;
    }

    public function create(string $token): TokenInterface
    {
        return new Token($token, $this->encoder);
    }
}
