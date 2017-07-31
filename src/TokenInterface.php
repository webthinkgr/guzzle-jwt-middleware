<?php

namespace Webthink\GuzzleJwt;

interface TokenInterface
{
    public function getTokenString();

    public function isValid();

    public function getPayload();

    public function getHeader();

    public function getSignature();
}
