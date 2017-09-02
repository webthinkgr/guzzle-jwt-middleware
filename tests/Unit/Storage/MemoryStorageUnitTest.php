<?php

namespace Webthink\GuzzleJwt\Test\Unit;

use Webthink\GuzzleJwt\Storage\MemoryStorage;
use Webthink\GuzzleJwt\Token\DummyToken;

class MemoryStorageUnitTest extends \PHPUnit_Framework_TestCase
{
    public function testMemoryStorageStoresToken()
    {
        $token = new DummyToken('token', [], [], 'signature');
        $storage = new MemoryStorage();
        $storage->storeToken($token);
        $this->assertSame($token, $storage->getToken());
    }
}