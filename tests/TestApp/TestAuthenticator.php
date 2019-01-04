<?php

declare(strict_types=1);

namespace Webthink\GuzzleJwt\Test\TestApp;

use Webthink\GuzzleJwt\AuthenticatorInterface;
use Webthink\GuzzleJwt\Token\DummyToken;
use Webthink\GuzzleJwt\TokenInterface;

final class TestAuthenticator implements AuthenticatorInterface
{
    public function authenticate(string $username, string $password): TokenInterface
    {
        return new DummyToken(
            'my_token',
            ['alg' => 'HS256'],
            ['admin' => true],
            'TJVA95OrM7E2cBab30RMHrHDcEfxjoYZgeFONFh7HgQ'
        );
    }
}
