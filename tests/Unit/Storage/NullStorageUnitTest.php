<?php

namespace Webthink\GuzzleJwt\Test\Unit;

use PHPUnit\Framework\TestCase;
use Webthink\GuzzleJwt\Storage\NullStorage;
use Webthink\GuzzleJwt\Token\DummyToken;

final class NullStorageUnitTest extends TestCase
{
    public function testMemoryStorageStoresToken()
    {
        $storage = new NullStorage();
        $storage->storeToken(new DummyToken('token', [], [], 'signature'));
        $this->assertEmpty($storage->getToken());
    }
}
