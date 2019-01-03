<?php

namespace Webthink\GuzzleJwt\Token;

/**
 * @author George Mponos <gmponos@gmail.com>
 */
final class Token extends AbstractToken
{
    /**
     * @inheritdoc
     */
    public function isValid()
    {
        return true;
    }
}
