<?php

declare(strict_types=1);

namespace Webthink\GuzzleJwt\Test\Unit;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;
use Webthink\GuzzleJwt\Storage\SymfonySessionStorage;
use Webthink\GuzzleJwt\Token\DummyToken;
use Webthink\GuzzleJwt\Token\TokenFactory\DummyTokenFactory;

final class SymfonySessionStorageUnitTest extends TestCase
{
    public function testMemoryStorageStoresToken()
    {
        $factory = new DummyTokenFactory([], [], 'signature');
        $session = new Session(new MockArraySessionStorage());
        $storage = new SymfonySessionStorage($session, $factory, 'mykey');
        $token = new DummyToken('token', [], [], 'signature');
        $storage->storeToken($token);

        $storedToken = $storage->getToken();
        $this->assertNotSame($token, $storedToken);

        $this->assertSame($token->getSignature(), $storedToken->getSignature());
        $this->assertSame($token->getHeader(), $storedToken->getHeader());
        $this->assertSame($token->getPayload(), $storedToken->getPayload());
        $this->assertSame($token->getTokenString(), $storedToken->getTokenString());
    }

    public function testThatSessionHasTheValue()
    {
        $factory = new DummyTokenFactory([], [], 'signature');
        $session = new Session(new MockArraySessionStorage());
        $storage = new SymfonySessionStorage($session, $factory, 'mykey');
        $token = new DummyToken('token', [], [], 'signature');
        $storage->storeToken($token);

        $this->assertSame($session->get('mykey'), $token->getTokenString());
    }
}
