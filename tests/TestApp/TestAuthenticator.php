<?php

namespace Webthink\GuzzleJwt\Test\TestApp;

use Webthink\GuzzleJwt\AuthenticatorInterface;
use Webthink\GuzzleJwt\TokenInterface;

class TestAuthenticator implements AuthenticatorInterface
{
    /**
     * @param string $username
     * @param string $password
     * @return TokenInterface
     */
    public function authenticate($username, $password)
    {
        return json_encode(['eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiYWRtaW4iOnRydWV9.TJVA95OrM7E2cBab30RMHrHDcEfxjoYZgeFONFh7HgQ']);
    }
}