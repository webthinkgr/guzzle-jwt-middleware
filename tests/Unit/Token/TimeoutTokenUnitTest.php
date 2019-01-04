<?php

declare(strict_types=1);

namespace Webthink\GuzzleJwt\Test\Unit\Token;

use PHPUnit\Framework\TestCase;
use Webthink\GuzzleJwt\Token\TimeoutToken;

final class TimeoutTokenUnitTest extends TestCase
{
    public function testCreateInvalidTimeoutTokenThrowsInvalidArgumentException()
    {
        $this->expectException(\InvalidArgumentException::class);
        new TimeoutToken('token');
    }
}
