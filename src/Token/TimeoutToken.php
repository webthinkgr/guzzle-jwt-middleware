<?php

namespace Webthink\GuzzleJwt\Token;

use Webthink\GuzzleJwt\Encoder\EncoderInterface;

/**
 * @author George Mponos <gmponos@xm.com>
 */
class TimeoutToken extends AbstractToken
{
    /**
     * @var int
     */
    private $offset;

    /**
     * TimeoutToken constructor.
     *
     * @param string $token
     * @param \Webthink\GuzzleJwt\Encoder\EncoderInterface|null $encoder
     * @param int $offset
     * @throws \InvalidArgumentException
     */
    public function __construct($token, EncoderInterface $encoder = null, $offset = 0)
    {
        parent::__construct($token, $encoder);
        $this->offset = $offset;
    }

    /**
     * @inheritdoc
     */
    public function isValid()
    {
        $payload = $this->getPayload();
        if (isset($payload['exp'])) {
            $now = new \DateTime('now');

            if (is_int($payload['exp'])) {
                return ($payload['exp'] - $this->offset - $now->getTimestamp()) > 0;
            }

            if (is_numeric($payload['exp'])) {
                return ($payload['exp'] - $this->offset - $now->format('U')) > 0;
            }
        }

        return false;
    }
}
