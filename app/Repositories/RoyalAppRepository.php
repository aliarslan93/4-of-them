<?php

namespace App\Repositories;

use App\Repositories\Interfaces\RoyalAppInterface;
use App\Repositories\Models\Request;
use App\Repositories\Traits\Application;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class RoyalAppRepository extends Request implements RoyalAppInterface
{
    use Application;
    public function __construct()
    {
        $this->initializeClient();
    }
    public function login($user)
    {
        if ($auth = $this->post('token', $user)) {
            $logged =  $this->response($auth, true, false);
            Session::put('user', $logged->user);
            Session::put('token_key', $logged->token_key);
            return $logged;
        }

        return [];
    }
    public function getAuthors()
    {
        $response = $this->get('authors', [
            [
                'orderBy' => 'id',
                'direction' => 'ASC',
                'limit' => 12,
                'page' => 1
            ]
        ]);

        return $this->response($response);
    }
    public function getAuthor($id)
    {
        return $this->get("authors/$id");
    }
    public function authorDelete($Id)
    {
        return $this->delete("authors/$Id");
    }
    public function addBook($request)
    {
        $data = $request;
        $data['author'] = ['id' => $request['author']];
        $data['release_date'] = date('c', strtotime($request['release_date']));
        $data['number_of_pages'] = (int)$request['number_of_pages'];
        $this->post("books", $data);
    }
    public function bookDelete($Id)
    {
        return $this->delete("books/$Id");
    }
}
