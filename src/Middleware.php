<?php

declare(strict_types=1);

namespace Webthink\GuzzleJwt;

use GuzzleHttp\Promise\RejectedPromise;
use Psr\Http\Message\RequestInterface;
use Webthink\GuzzleJwt\Exception\BadCredentialException;

/**
 * @author George Mponos <gmponos@gmail.com>
 */
final class Middleware
{
    /**
     * @var AuthenticatorInterface
     */
    private $authenticator;

    /**
     * @param \Webthink\GuzzleJwt\AuthenticatorInterface $authenticator
     */
    public function __construct(AuthenticatorInterface $authenticator)
    {
        $this->authenticator = $authenticator;
    }

    /**
     * @param callable $handler
     * @return \Closure
     */
    public function __invoke(callable $handler)
    {
        return function (RequestInterface $request, array $options) use ($handler) {
            if (!isset($options['jwt']) || $options['jwt'] === false) {
                return $handler($request, $options);
            }

            if (!isset($options['jwt']['username']) || !isset($options['jwt']['password'])) {
                return new RejectedPromise(
                    new BadCredentialException(
                        'Auth credentials are not set correctly. Both username and password must be set',
                        $request
                    )
                );
            }

            $token = $this->authenticator->authenticate($options['jwt']['username'], $options['jwt']['password']);

            $request = $request->withHeader('Authorization', 'Bearer ' . $token->getTokenString());
            return $handler($request, $options);
        };
    }
}
