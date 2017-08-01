<?php

namespace Webthink\GuzzleJwt\Authenticator;

use Webthink\GuzzleJwt\AuthenticatorInterface;
use Webthink\GuzzleJwt\StorageInterface;
use Webthink\GuzzleJwt\TokenInterface;

class StoreAuthenticator implements AuthenticatorInterface
{
    /**
     * @var \Webthink\GuzzleJwt\StorageInterface
     */
    private $storage;

    /**
     * @var \Webthink\GuzzleJwt\AuthenticatorInterface
     */
    private $authenticator;

    public function __construct(AuthenticatorInterface $authenticator, StorageInterface $storage)
    {
        $this->storage = $storage;
        $this->authenticator = $authenticator;
    }

    /**
     * @param string $username
     * @param string $password
     * @return \Webthink\GuzzleJwt\TokenInterface|null
     */
    public function authenticate($username, $password)
    {
        $token = $this->storage->getToken();
        if ($token !== null && $token instanceof TokenInterface) {
            return $token;
        }

        $token = $this->authenticator->authenticate($username, $password);
        $this->storage->storeToken($token);
        return $token;
    }
}