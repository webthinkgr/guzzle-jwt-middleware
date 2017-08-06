<?php

namespace Webthink\GuzzleJwt\Test\Unit\Encoder;

use Webthink\GuzzleJwt\Encoder\Base64Encoder;

class Base64EncoderUnitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Base64Encoder
     */
    private $encoder;

    public function setUp()
    {
        $this->encoder = new Base64Encoder();
    }

    public function testEncodeAndDecode()
    {
        $encoded = $this->encoder->encode('test');
        $this->assertInternalType('string', $encoded);
        $this->assertEquals('test', $this->encoder->decode($encoded));
    }
}