<?php

namespace Webthink\GuzzleJwt\Token;

/**
 * @author George Mponos <gmponos@gmail.com>
 */
class Token extends AbstractToken
{
    /**
     * @inheritdoc
     */
    public function isValid()
    {
        return true;
    }
}
