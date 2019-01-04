<?php

declare(strict_types=1);

namespace Webthink\GuzzleJwt\Test\Unit;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Webthink\GuzzleJwt\Exception\BadCredentialException;
use Webthink\GuzzleJwt\Middleware;
use Webthink\GuzzleJwt\Test\TestApp\TestAuthenticator;

final class MiddlewareUnitTest extends TestCase
{
    public function testMiddlewareWithoutPassingOptionsForJwt()
    {
        $this->expectNotToPerformAssertions();
        $authenticator = new TestAuthenticator();
        $handler = new MockHandler([
            new Response(200, [], 'test'),
        ]);
        $middleware = new Middleware($authenticator);
        $function = $middleware($handler);

        $promise = $function(new Request('get', '/'), []);
        $promise->wait();
    }

    public function testMiddlewareWhenPassingOneOption()
    {
        $authenticator = new TestAuthenticator();
        $handler = new MockHandler([
            new Response(200, [], 'test'),
        ]);
        $middleware = new Middleware($authenticator);
        $function = $middleware($handler);

        $promise = $function(new Request('get', '/'), [
            'jwt' => [
                'username' => 'user',
            ],
        ]);

        $this->expectException(BadCredentialException::class);
        $promise->wait();
    }

    public function testMiddlewareWithCorrectOptions()
    {
        $this->expectNotToPerformAssertions();
        $authenticator = new TestAuthenticator();
        $handler = new MockHandler([
            new Response(200, [], 'test'),
        ]);
        $middleware = new Middleware($authenticator);
        $function = $middleware($handler);

        $promise = $function(new Request('get', '/'), [
            'jwt' => [
                'username' => 'user',
                'password' => 'pass',
            ],
        ]);

        $promise->wait();
    }

    public function testMiddlewareWhenJwtOptionIsSetAsFalse()
    {
        $this->expectNotToPerformAssertions();
        $authenticator = new TestAuthenticator();
        $handler = new MockHandler([
            new Response(200, [], 'test'),
        ]);
        $middleware = new Middleware($authenticator);
        $function = $middleware($handler);

        $promise = $function(new Request('get', '/'), [
            'jwt' => false,
        ]);

        $promise->wait();
    }
}
