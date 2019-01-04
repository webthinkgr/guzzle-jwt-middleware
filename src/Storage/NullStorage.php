<?php

declare(strict_types=1);

namespace Webthink\GuzzleJwt\Storage;

use Webthink\GuzzleJwt\StorageInterface;
use Webthink\GuzzleJwt\TokenInterface;

/**
 * @author George Mponos <gmponos@gmail.com>
 */
final class NullStorage implements StorageInterface
{
    public function storeToken(TokenInterface $token): void
    {
        return;
    }

    public function getToken(): ?TokenInterface
    {
        return null;
    }
}
