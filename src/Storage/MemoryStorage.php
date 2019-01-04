<?php

declare(strict_types=1);

namespace Webthink\GuzzleJwt\Storage;

use Webthink\GuzzleJwt\StorageInterface;
use Webthink\GuzzleJwt\TokenInterface;

/**
 * @author George Mponos <gmponos@gmail.com>
 */
final class MemoryStorage implements StorageInterface
{
    /**
     * @var TokenInterface|null
     */
    private $store = null;

    public function getToken(): ?TokenInterface
    {
        return $this->store;
    }

    public function storeToken(TokenInterface $token): void
    {
        $this->store = $token;
    }
}
