<?php

declare(strict_types=1);

namespace Webthink\GuzzleJwt\Test\Unit;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Webthink\GuzzleJwt\Authenticator\StoreAuthenticator;
use Webthink\GuzzleJwt\AuthenticatorInterface;
use Webthink\GuzzleJwt\Storage\MemoryStorage;
use Webthink\GuzzleJwt\Storage\NullStorage;
use Webthink\GuzzleJwt\Token\DummyToken;
use Webthink\GuzzleJwt\TokenInterface;

final class StoreAuthenticatorUnitTest extends TestCase
{
    public function testThatTokenIsStored()
    {
        /** @var AuthenticatorInterface|MockObject $testAuthenticator */
        $testAuthenticator = $this->getMockBuilder(AuthenticatorInterface::class)->getMock();

        $testAuthenticator->expects($this->exactly(1))
            ->method('authenticate')
            ->with('username', 'pass')
            ->willReturn(new DummyToken('my_token', [], [], 'signature'));

        $authenticator = new StoreAuthenticator($testAuthenticator, new MemoryStorage());
        $this->assertInstanceOf(TokenInterface::class, $authenticator->authenticate('username', 'pass'));
        $this->assertInstanceOf(TokenInterface::class, $authenticator->authenticate('username', 'pass'));
    }

    public function testThatTokenCanNotBeStored()
    {
        /** @var AuthenticatorInterface|MockObject $testAuthenticator */
        $testAuthenticator = $this->getMockBuilder(AuthenticatorInterface::class)->getMock();

        $testAuthenticator->expects($this->exactly(3))
            ->method('authenticate')
            ->with('username', 'pass')
            ->willReturn(new DummyToken('my_token', [], [], 'signature'));

        $authenticator = new StoreAuthenticator($testAuthenticator, new NullStorage());
        $this->assertInstanceOf(TokenInterface::class, $authenticator->authenticate('username', 'pass'));
        $this->assertInstanceOf(TokenInterface::class, $authenticator->authenticate('username', 'pass'));
        $this->assertInstanceOf(TokenInterface::class, $authenticator->authenticate('username', 'pass'));
    }

    public function testStoreAuthenticatorCanNotBePassedInsideAnotherStoreAuthenticator()
    {
        /** @var AuthenticatorInterface|MockObject $testAuthenticator */
        $testAuthenticator = $this->getMockBuilder(AuthenticatorInterface::class)->getMock();
        $storeAuthenticator1 = new StoreAuthenticator($testAuthenticator, new NullStorage());

        $this->expectException(\InvalidArgumentException::class);
        new StoreAuthenticator($storeAuthenticator1, new NullStorage());
    }
}
