<?php

namespace Webthink\GuzzleJwt;

/**
 * @author George Mponos <gmponos@xm.com>
 */
interface AuthenticatorInterface
{
    /**
     * This is the class that communicates with the API and returns a JWT token.
     *
     * Any exception that it is thrown internally must be converted to a RequestException of guzzle.
     * If the API returned a token but the token is not valid then
     * a {@see \Webthink\GuzzleJwt\Exception\BadTokenRequestException} must be thrown.
     *
     * @param string $username
     * @param string $password
     * @return \Webthink\GuzzleJwt\TokenInterface
     * @throws \GuzzleHttp\Exception\RequestException
     */
    public function authenticate($username, $password);
}
