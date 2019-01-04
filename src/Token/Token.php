<?php

declare(strict_types=1);

namespace Webthink\GuzzleJwt\Token;

/**
 * @author George Mponos <gmponos@gmail.com>
 */
final class Token extends AbstractToken
{
    public function isValid(): bool
    {
        return true;
    }
}
