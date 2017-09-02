<?php

namespace Webthink\GuzzleJwt\Test\Unit;

use Webthink\GuzzleJwt\Storage\ChainStorage;
use Webthink\GuzzleJwt\Storage\NullStorage;
use Webthink\GuzzleJwt\StorageInterface;
use Webthink\GuzzleJwt\Token\DummyToken;

class ChainStorageUnitTest extends \PHPUnit_Framework_TestCase
{
    public function testThatChainStorageStoresInBothStorages()
    {
        $storage1 = $this->getMockBuilder(StorageInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $storage2 = $this->getMockBuilder(StorageInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $chainStorage = new ChainStorage([
            $storage1,
            $storage2,
        ]);

        $storage1->expects($this->exactly(1))->method('storeToken');
        $storage2->expects($this->exactly(1))->method('storeToken');

        $chainStorage->storeToken(new DummyToken('token', [], [], 'signature'));
    }

    public function testThatTokenComesFromFirstStorage()
    {
        $storage1 = $this->getMockBuilder(StorageInterface::class)->getMock();
        $storage2 = $this->getMockBuilder(StorageInterface::class)->getMock();
        $chainStorage = new ChainStorage([
            $storage1,
            $storage2,
        ]);

        $storage1->expects($this->exactly(1))
            ->method('getToken')
            ->willReturn(new DummyToken('token', [], [], 'signature'));

        $storage2->expects($this->exactly(0))->method('getToken');

        $chainStorage->getToken();
    }

    public function testInitializingAStorageWithAStorageTokenIsNotAccepted()
    {
        $storage1 = $this->getMockBuilder(ChainStorage::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->setExpectedException(\InvalidArgumentException::class);
        new ChainStorage([
            $storage1,
        ]);
    }

    public function testThatNoStorageHadTokenWillReturnNull()
    {
        $storage = new ChainStorage([
            new NullStorage(),
        ]);
        $this->assertNull($storage->getToken());
    }

    public function testWithANonStorageClass()
    {
        $storage1 = $this->getMockBuilder(\stdClass::class)->getMock();
        $this->setExpectedException(\InvalidArgumentException::class);
        new ChainStorage([
            $storage1,
        ]);
    }

    public function testThatYouCanNotInitializeAChainStorageWithEmptyArray()
    {
        $this->setExpectedException(\InvalidArgumentException::class);
        new ChainStorage([]);
    }
}
