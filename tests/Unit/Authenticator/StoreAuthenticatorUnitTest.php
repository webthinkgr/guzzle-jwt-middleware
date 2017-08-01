<?php

namespace Webthink\GuzzleJwt\Test\Unit;

use PHPUnit_Framework_MockObject_MockObject as MockObject;
use Webthink\GuzzleJwt\Authenticator\StoreAuthenticator;
use Webthink\GuzzleJwt\AuthenticatorInterface;
use Webthink\GuzzleJwt\Storage\MemoryStorage;
use Webthink\GuzzleJwt\Storage\NullStorage;
use Webthink\GuzzleJwt\Token\DummyToken;
use Webthink\GuzzleJwt\TokenInterface;

class StoreAuthenticatorUnitTest extends \PHPUnit_Framework_TestCase
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
}