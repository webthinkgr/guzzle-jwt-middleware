<?php

namespace Webthink\GuzzleJwt\Storage;

use Webthink\GuzzleJwt\StorageInterface;
use Webthink\GuzzleJwt\TokenInterface;

/**
 * @author George Mponos <gmponos@xm.com>
 */
class NullStorage implements StorageInterface
{
    /**
     * @inheritdoc
     */
    public function storeToken(TokenInterface $token)
    {
        return;
    }

    /**
     * @inheritdoc
     */
    public function getToken()
    {
        return null;
    }
}
