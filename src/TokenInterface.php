<?php

declare(strict_types=1);

namespace Webthink\GuzzleJwt;

/**
 * @author George Mponos <gmponos@gmail.com>
 */
interface TokenInterface
{
    /**
     * Returns the token in the plain form.
     *
     * @return string
     */
    public function getTokenString(): string;

    /**
     * @return array
     */
    public function getPayload(): array;

    /**
     * @return array
     */
    public function getHeader(): array;

    /**
     * @return string
     */
    public function getSignature(): string;

    /**
     * Checks if the token is valid
     *
     * @return bool
     */
    public function isValid(): bool;
}
