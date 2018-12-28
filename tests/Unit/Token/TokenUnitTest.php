<?php

namespace Webthink\GuzzleJwt\Test\Unit\Token;

use PHPUnit\Framework\TestCase;
use Webthink\GuzzleJwt\Token\Token;

class TokenUnitTest extends TestCase
{
    public function testCreateInvalidTimeoutTokenThrowsInvalidArgumentException()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Token('token');
    }
}
