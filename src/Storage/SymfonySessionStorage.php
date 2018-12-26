<?php

namespace Webthink\GuzzleJwt\Storage;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Webthink\GuzzleJwt\StorageInterface;
use Webthink\GuzzleJwt\Token\TokenFactory\TokenFactoryInterface;
use Webthink\GuzzleJwt\TokenInterface;

/**
 * @author George Mponos <gmponos@gmail.com>
 */
class SymfonySessionStorage implements StorageInterface
{
    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var string
     */
    private $key;

    /**
     * @var TokenFactoryInterface
     */
    private $factory;

    /**
     * @param \Symfony\Component\HttpFoundation\Session\SessionInterface $session
     * @param \Webthink\GuzzleJwt\Token\TokenFactory\TokenFactoryInterface $factory
     * @param string $sessionKey
     */
    public function __construct(SessionInterface $session, TokenFactoryInterface $factory, $sessionKey)
    {
        $this->session = $session;
        $this->key = $sessionKey;
        $this->factory = $factory;
    }

    /**
     * @inheritdoc
     */
    public function storeToken(TokenInterface $token)
    {
        $this->session->set($this->key, $token->getTokenString());
    }

    /**
     * @inheritdoc
     */
    public function getToken()
    {
        $token = $this->session->get($this->key, null);
        if ($token === null) {
            return null;
        }

        return $this->factory->create($token);
    }
}
