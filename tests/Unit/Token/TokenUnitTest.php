<?php

namespace Webthink\GuzzleJwt\Test\Unit\Token;

use Webthink\GuzzleJwt\Token\Token;

class TokenUnitTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateInvalidTimeoutTokenThrowsInvalidArgumentException()
    {
        $this->setExpectedException(\InvalidArgumentException::class);
        new Token('token');
    }
}
