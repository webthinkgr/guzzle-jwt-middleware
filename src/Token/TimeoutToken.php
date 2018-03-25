<?php

namespace Webthink\GuzzleJwt\Token;

use Webthink\GuzzleJwt\Encoder\EncoderInterface;

/**
 * Timeout token describes a token that includes in it's payload an expiration.
 *
 * @author George Mponos <gmponos@xm.com>
 */
class TimeoutToken extends AbstractToken
{
    /**
     * @var int
     */
    private $offset;

    /**
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
                return ($now->getTimestamp() - $payload['exp'] - $this->offset) > 0;
            }

            if (is_numeric($payload['exp'])) {
                return ($now->format('U') - $payload['exp'] - $this->offset) > 0;
            }
        }

        return false;
    }
}
