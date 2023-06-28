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
    public function getAuthors()
    {
        $response = $this->get('authors', [
            [
                'orderBy' => 'id',
                'direction' => 'ASC',
                'limit' => 12,
                'page' => 1
            ]
        ])->getBody()->getContents();
        $response = json_decode($response);
        return $response;
    }
    public function getAuthor($id)
    {
        $response = $this->get("authors/$id")->getBody()->getContents();
        return json_decode($response);
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
