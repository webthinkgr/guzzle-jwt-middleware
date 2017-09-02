<?php

namespace Webthink\GuzzleJwt\Test\Unit;

use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Webthink\GuzzleJwt\Storage\PsrCacheStorage;
use Webthink\GuzzleJwt\Token\DummyToken;
use Webthink\GuzzleJwt\Token\TokenFactory\DummyTokenFactory;

class PsrCacheStorageUnitTest extends \PHPUnit_Framework_TestCase
{
    public function testStoredToken()
    {
        $tokenFactory = new DummyTokenFactory([], [], 'signature');
        $adapter = new ArrayAdapter();
        $storage = new PsrCacheStorage($adapter, $tokenFactory, 'key', 300);
        $token = new DummyToken('token', [], [], 'signature');
        $storage->storeToken($token);

        $storedToken = $storage->getToken();
        $this->assertNotSame($token, $storedToken);

        $this->assertSame($token->getSignature(), $storedToken->getSignature());
        $this->assertSame($token->getHeader(), $storedToken->getHeader());
        $this->assertSame($token->getPayload(), $storedToken->getPayload());
        $this->assertSame($token->getTokenString(), $storedToken->getTokenString());
    }

    public function testThatAdapterHasTheCacheValue()
    {
        $tokenFactory = new DummyTokenFactory([], [], 'signature');
        $adapter = new ArrayAdapter();
        $storage = new PsrCacheStorage($adapter, $tokenFactory, 'key', 300);
        $token = new DummyToken('token', [], [], 'signature');
        $storage->storeToken($token);

        $this->assertSame($adapter->getItem('key')->get(), $token->getTokenString());
    }
}
