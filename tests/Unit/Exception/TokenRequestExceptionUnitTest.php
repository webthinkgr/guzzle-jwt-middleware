<?php

namespace Webthink\GuzzleJwt\Test\Unit;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Webthink\GuzzleJwt\Exception\TokenRequestException;

class TokenRequestExceptionUnitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TokenRequestException
     */
    private $exception;

    public function setUp()
    {
        parent::setUp();
        $this->exception = new TokenRequestException(
            'message',
            new Request('get', 'www.test.com'),
            new Response(),
            new \Exception()
        );
    }

    public function testThatExceptionHasTheRequest()
    {
        $this->assertInstanceOf(RequestInterface::class, $this->exception->getRequest());
    }

    public function testThatExceptionHasTheResponse()
    {
        $this->assertInstanceOf(ResponseInterface::class, $this->exception->getResponse());
    }
}
