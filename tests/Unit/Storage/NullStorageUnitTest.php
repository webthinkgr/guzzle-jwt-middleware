<?php

namespace Webthink\GuzzleJwt\Test\Unit;

use Webthink\GuzzleJwt\Storage\NullStorage;
use Webthink\GuzzleJwt\Token\DummyToken;

class NullStorageUnitTest extends \PHPUnit_Framework_TestCase
{
    public function testMemoryStorageStoresToken()
    {
        $storage = new NullStorage();
        $storage->storeToken(new DummyToken('token', [], [], 'signature'));
        $this->assertEmpty($storage->getToken());
    }
}