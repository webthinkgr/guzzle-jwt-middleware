<?php

namespace Webthink\GuzzleJwt\Encoder;

/**
 * @author George Mponos <gmponos@gmail.com>
 */
class Base64Encoder implements EncoderInterface
{
    /**
     * @param string $data
     * @return string
     */
    public function encode($data)
    {
        return base64_encode($data);
    }

    /**
     * @param string $data
     * @return string
     */
    public function decode($data)
    {
        return base64_decode($data);
    }
}
