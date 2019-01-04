<?php

declare(strict_types=1);

namespace Webthink\GuzzleJwt;

/**
 * @author George Mponos <gmponos@gmail.com>
 */
interface AuthenticatorInterface
{
    /**
     * This is the class that communicates with the API and returns a JWT token.
     *
     * Any exception that it is thrown internally must be converted to a RequestException of guzzle.
     *
     * @param string $username
     * @param string $password
     * @return \Webthink\GuzzleJwt\TokenInterface
     * @throws \GuzzleHttp\Exception\RequestException
     */
    public function authenticate(string $username, string $password): TokenInterface;
}
