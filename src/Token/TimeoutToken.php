<?php

namespace Webthink\GuzzleJwt\Token;

use Webthink\GuzzleJwt\Encoder\EncoderInterface;

class TimeoutToken extends AbstractToken
{
    /**
     * @var int
     */
    private $offset;

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
                return ($now->getTimestamp() - $payload['exp']) > 0;
            }

            if (is_numeric($payload['exp'])) {
                return ($now->format('U') - $payload['exp']) > 0;
            }
        }

        return false;
    }
}
