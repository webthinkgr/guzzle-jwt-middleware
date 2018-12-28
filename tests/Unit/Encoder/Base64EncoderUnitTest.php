<?php

namespace Webthink\GuzzleJwt\Test\Unit\Encoder;

use PHPUnit\Framework\TestCase;
use Webthink\GuzzleJwt\Encoder\Base64Encoder;

final class Base64EncoderUnitTest extends TestCase
{
    /**
     * @var Base64Encoder
     */
    private $encoder;

    public function setUp()
    {
        parent::setUp();
        $this->encoder = new Base64Encoder();
    }

    public function testEncodeAndDecode()
    {
        $encoded = $this->encoder->encode('test');
        $this->assertInternalType('string', $encoded);
        $this->assertSame('test', $this->encoder->decode($encoded));
    }
}
