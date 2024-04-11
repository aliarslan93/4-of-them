<?php

namespace App\Repositories\Traits;

trait Application
{

    public function initializeClient(): void
    {
        $this->base_url = config('royalapp.base_url');
        $this->authorization = config('royalapp.authorization');
        parent::__construct();
    }
}
