<?php

namespace Webthink\GuzzleJwt;

interface StorageInterface
{
    /**
     * This function will store a token inside the storage.
     * Before storing it will also check if the token is valid.
     *
     * @param TokenInterface $token
     * @return void
     */
    public function storeToken(TokenInterface $token);

    /**
     * @return TokenInterface
     */
    public function getToken();
}
