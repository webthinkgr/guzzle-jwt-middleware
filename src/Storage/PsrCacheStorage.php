<?php

declare(strict_types=1);

namespace Webthink\GuzzleJwt\Storage;

use Psr\Cache\CacheItemPoolInterface;
use Webthink\GuzzleJwt\StorageInterface;
use Webthink\GuzzleJwt\Token\TokenFactory\TokenFactoryInterface;
use Webthink\GuzzleJwt\TokenInterface;

/**
 * @author George Mponos <gmponos@gmail.com>
 */
final class PsrCacheStorage implements StorageInterface
{
    /**
     * @var CacheItemPoolInterface
     */
    private $cache;

    /**
     * @var string
     */
    private $key;

    /**
     * @var int|\DateTimeInterface
     */
    private $expTime;

    /**
     * @var TokenFactoryInterface
     */
    private $factory;

    /**
     * @param \Psr\Cache\CacheItemPoolInterface $cache
     * @param \Webthink\GuzzleJwt\Token\TokenFactory\TokenFactoryInterface $factory
     * @param string $key
     * @param int $expTime
     */
    public function __construct(
        CacheItemPoolInterface $cache,
        TokenFactoryInterface $factory,
        string $key,
        int $expTime = 0
    ) {
        $this->cache = $cache;
        $this->key = $key;
        $this->expTime = $expTime;
        $this->factory = $factory;
    }

    public function storeToken(TokenInterface $token): void
    {
        $item = $this->cache->getItem($this->key);
        $item->set($token->getTokenString());
        $item->expiresAfter($this->expTime);
        $this->cache->save($item);
    }

    public function getToken(): ?TokenInterface
    {
        $item = $this->cache->getItem($this->key);
        if ($item->isHit() === false) {
            return null;
        }

        $token = $item->get();
        return $this->factory->create($token);
    }
}
