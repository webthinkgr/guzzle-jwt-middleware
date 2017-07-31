<?php

namespace Webthink\GuzzleJwt;

interface TokenInterface
{
    /**
     * Returns the token in the plain form.
     *
     * @return string
     */
    public function getTokenString();

    public function getPayload();

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
