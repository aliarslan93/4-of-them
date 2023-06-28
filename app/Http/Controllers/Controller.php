<?php

namespace App\Http\Controllers;

use App\Repositories\RoyalAppRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    protected $appRepository;
    public function __construct()
    {
        $this->appRepository = new RoyalAppRepository();
    }
}
