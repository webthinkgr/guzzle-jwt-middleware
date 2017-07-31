<?php

namespace Webthink\GuzzleJwt;

interface AuthenticatorInterface
{
    /**
     * @param string $username
     * @param string $password
     * @return TokenInterface
     */
    public function authenticate($username, $password);
}
