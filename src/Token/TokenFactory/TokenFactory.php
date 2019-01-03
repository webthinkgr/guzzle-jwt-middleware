<?php

namespace Webthink\GuzzleJwt\Token\TokenFactory;

use Webthink\GuzzleJwt\Encoder\Base64Encoder;
use Webthink\GuzzleJwt\Encoder\EncoderInterface;
use Webthink\GuzzleJwt\Token\Token;

/**
 * @author George Mponos <gmponos@xm.com>
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

    /**
     * @param string $token
     * @return \Webthink\GuzzleJwt\Token\Token
     */
    public function create($token)
    {
        return new Token($token, $this->encoder);
    }
}
