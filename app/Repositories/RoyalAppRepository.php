<?php

namespace App\Repositories;

use App\Repositories\Models\Request;
use Illuminate\Support\Facades\Session;

class RoyalAppRepository extends Request
{
    public function login($user)
    {

        if ($auth = $this->post('token', $user)) {
            $logged =  json_decode($auth->getBody()->getContents());
            Session::put('user', $logged->user);
            Session::put('token_key', $logged->token_key);
            return $logged;
        }

        return [];
    }
}
