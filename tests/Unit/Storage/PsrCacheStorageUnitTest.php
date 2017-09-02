<?php

namespace Webthink\GuzzleJwt\Test\Unit;

use Webthink\GuzzleJwt\Storage\NullStorage;
use Webthink\GuzzleJwt\Storage\PsrCacheStorage;
use Webthink\GuzzleJwt\Token\DummyToken;

class PsrCacheStorageUnitTest extends \PHPUnit_Framework_TestCase
{
    public function testMemoryStorageStoresToken()
    {
        new 
        $storage = new PsrCacheStorage();
        $storage->storeToken(new DummyToken('token', [], [], 'signature'));
        $this->assertEmpty($storage->getToken());
    }
}