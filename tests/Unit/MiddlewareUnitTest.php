<?php

namespace Webthink\GuzzleJwt\Test\Unit;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Webthink\GuzzleJwt\Middleware;
use Webthink\GuzzleJwt\Test\TestApp\TestAuthenticator;

class MiddlewareUnitTest extends \PHPUnit_Framework_TestCase
{
    public function testMiddlewareWithoutPassingOptionsForJwt()
    {
        $authenticator = new TestAuthenticator();
        $handler = new MockHandler([
            new Response(200, [], 'test'),
        ]);
        $middleware = new Middleware($authenticator);
        $function = $middleware($handler);

        $promise = $function(new Request('get', '/'), []);
        $promise->wait();
    }

    /**
     * @test
     * @expectedException \Webthink\GuzzleJwt\Exception\BadCredentialException
     */
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
        $promise->wait();
    }
}