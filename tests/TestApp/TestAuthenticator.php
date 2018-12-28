<?php

namespace Webthink\GuzzleJwt\Test\TestApp;

use Webthink\GuzzleJwt\AuthenticatorInterface;
use Webthink\GuzzleJwt\Token\DummyToken;

final class TestAuthenticator implements AuthenticatorInterface
{
    /**
     * @inheritdoc
     */
    public function authenticate($username, $password)
    {
        return new DummyToken(
            'my_token',
            ['alg' => 'HS256'],
            ['admin' => true],
            'TJVA95OrM7E2cBab30RMHrHDcEfxjoYZgeFONFh7HgQ'
        );
    }
}
