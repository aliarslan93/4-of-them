<?php

namespace App\Repositories\Interfaces;

interface RoyalAppInterface
{
    /**
     * 
     * app gonna have to base url and auth token for client initialize.
     */
    public function initializeClient(): void;
}
