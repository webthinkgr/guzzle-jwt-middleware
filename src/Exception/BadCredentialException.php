<?php

declare(strict_types=1);

namespace Webthink\GuzzleJwt\Exception;

use GuzzleHttp\Exception\RequestException;

/**
 * @author George Mponos <gmponos@gmail.com>
 */
final class BadCredentialException extends RequestException
{
}
