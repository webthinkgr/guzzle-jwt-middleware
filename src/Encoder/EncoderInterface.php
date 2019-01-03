<?php

declare(strict_types=1);

namespace Webthink\GuzzleJwt\Encoder;

/**
 * @author George Mponos <gmponos@gmail.com>
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
