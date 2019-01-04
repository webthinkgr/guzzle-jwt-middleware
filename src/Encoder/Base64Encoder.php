<?php

declare(strict_types=1);

namespace Webthink\GuzzleJwt\Encoder;

/**
 * @author George Mponos <gmponos@gmail.com>
 */
final class Base64Encoder implements EncoderInterface
{
    public function encode(string $data): string
    {
        return base64_encode($data);
    }

    public function decode(string $data): string
    {
        return base64_decode($data);
    }
}
