<?php

declare(strict_types=1);

namespace Webthink\GuzzleJwt\Token\TokenFactory;

use Webthink\GuzzleJwt\Encoder\EncoderInterface;
use Webthink\GuzzleJwt\Token\TimeoutToken;

/**
 * @author George Mponos <gmponos@xm.com>
 */
final class TimeoutTokenFactory implements TokenFactoryInterface
{
    /**
     * @var EncoderInterface
     */
    private $encoder;

    /**
     * @var int
     */
    private $offset;

    /**
     * @param \Webthink\GuzzleJwt\Encoder\EncoderInterface|null $encoder
     * @param int $offset
     */
    public function __construct(EncoderInterface $encoder = null, $offset = 0)
    {
        $this->encoder = $encoder;
        $this->offset = $offset;
    }

    /**
     * @param string $token
     * @return \Webthink\GuzzleJwt\Token\TimeoutToken
     * @throws \InvalidArgumentException
     */
    public function create($token)
    {
        return new TimeoutToken($token, $this->encoder, $this->offset);
    }
}
