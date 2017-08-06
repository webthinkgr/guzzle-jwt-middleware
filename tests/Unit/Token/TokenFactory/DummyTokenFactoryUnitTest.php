<?php

namespace Webthink\GuzzleJwt\Test\Unit\Token\TokenFactory;

use Webthink\GuzzleJwt\Token\DummyToken;
use Webthink\GuzzleJwt\Token\TokenFactory\DummyTokenFactory;

class DummyTokenFactoryUnitTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateDummyToken()
    {
        $factory = new DummyTokenFactory(['payload'], ['header'], 'signature');
        $token = $factory->create('token');

        $this->assertInstanceOf(DummyToken::class, $token);
    }

    public function testValuesOfCreatedDummyToken()
    {
        $factory = new DummyTokenFactory(['payload'], ['header'], 'signature');
        $token = $factory->create('token');

        $this->assertSame('token', $token->getTokenString());
        $this->assertSame(['payload'], $token->getPayload());
        $this->assertSame(['header'], $token->getHeader());
        $this->assertSame('signature', $token->getSignature());
    }
}