<?php

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
    public function getTokenString();

    /**
     * @return array
     */
    public function getPayload();

    /**
     * @return array
     */
    public function getHeader();

    /**
     * @return string
     */
    public function getSignature();

    /**
     * Checks if the token is valid
     *
     * @return bool
     */
    public function isValid();
}
