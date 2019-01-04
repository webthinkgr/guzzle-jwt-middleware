<?php

declare(strict_types=1);

namespace Webthink\GuzzleJwt\Test\Unit;

use PHPUnit\Framework\TestCase;
use Webthink\GuzzleJwt\Storage\MemoryStorage;
use Webthink\GuzzleJwt\Token\DummyToken;

final class MemoryStorageUnitTest extends TestCase
{
    public function testMemoryStorageStoresToken()
    {
        $token = new DummyToken('token', [], [], 'signature');
        $storage = new MemoryStorage();
        $storage->storeToken($token);
        $this->assertSame($token, $storage->getToken());
    }
}
