<?php

namespace Webthink\GuzzleJwt;

use Psr\Http\Message\RequestInterface;

/**
 * @author George Mponos <gmponos@gmail.com>
 */
class Middleware
{
    /**
     * @var AuthenticatorInterface
     */
    private $authenticator;

    /**
     * @var StorageInterface
     */
    private $storage;

    public function __construct(AuthenticatorInterface $authenticator, StorageInterface $storage)
    {
        $this->authenticator = $authenticator;
        $this->storage = $storage;
    }

    /**
     * @param callable $handler
     * @return \Closure
     */
    public function __invoke(callable $handler)
    {
        return function (RequestInterface $request, array $options) use ($handler) {
            if (!isset($options['jwt'])) {
                return $handler($request, $options);
            }

            if (!isset($options['jwt']['username']) || !isset($options['jwt']['password'])) {
                return $handler($request, $options);
            }

            $token = $this->storage->getToken();

            if ($token === null || !$token->isValid()) {
                $token = $this->authenticator->authenticate($options['jwt']['username'], $options['jwt']['password']);
                $this->storage->storeToken($token);
            }

            $request = $request->withHeader('Authorization', 'Bearer ' . $token->getTokenString());
            return $handler($request, $options);
        };
    }
}
