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

            if ($storage instanceof ChainStorage) {
                throw new \InvalidArgumentException('You can not pass a ChainStorage inside another');
            }
        }

        $this->storages = $storages;
    }

    /**
     * @inheritdoc
     */
    public function storeToken(TokenInterface $token)
    {
        foreach ($this->storages as $storage) {
            $storage->storeToken($token);
        }
    }

    /**
     * @inheritdoc
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
