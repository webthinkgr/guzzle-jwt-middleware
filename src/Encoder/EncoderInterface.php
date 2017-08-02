<?php

namespace Webthink\GuzzleJwt\Encoder;

/**
 * Interface EncoderInterface
 */
interface EncoderInterface
{
    /**
     * @param string $data
     * @return string
     */
    public function encode($data);

    /**
     * @param string $data
     * @return string
     */
    public function decode($data);
}
