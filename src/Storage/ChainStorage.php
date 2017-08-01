<?php

namespace Webthink\GuzzleJwt\Storage;

use Webthink\GuzzleJwt\StorageInterface;
use Webthink\GuzzleJwt\TokenInterface;

/**
 * @author George Mponos <gmponos@gmail.com>
 */
class ChainStorage implements StorageInterface
{
    /**
     * @var StorageInterface[]
     */
    private $storages;

    /**
     * ChainStorage constructor.
     *
     * @param StorageInterface[] $storages
     */
    public function __construct(array $storages)
    {
        foreach ($storages as $storage) {
            if (!$storage instanceof StorageInterface) {
                throw new \InvalidArgumentException('Expected StorageInterface class');
            }
        }

        $this->storages = $storages;
    }

    /**
     * This function will store a token.
     *
     * @param \Webthink\GuzzleJwt\TokenInterface $token
     * @return void
     */
    public function storeToken(TokenInterface $token)
    {
        foreach ($this->storages as $storage) {
            $storage->storeToken($token);
        }
    }

    /**
     * Returns either the token or null if the token could not be retrieved from the storage.
     *
     * @return \Webthink\GuzzleJwt\TokenInterface|null
     */
    public function getToken()
    {
        foreach ($this->storages as $storage) {
            $token = $storage->getToken();
            if ($token !== null) {
                return $token;
            }
        }

        return null;
    }
}