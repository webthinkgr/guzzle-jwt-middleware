<?php

namespace Webthink\GuzzleJwt\Test\Unit\Token;

use Webthink\GuzzleJwt\Token\TimeoutToken;

class TimeoutTokenUnitTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateInvalidTimeoutTokenThrowsInvalidArgumentException()
    {
        $this->setExpectedException(\InvalidArgumentException::class);
        new TimeoutToken('token');
    }
}
