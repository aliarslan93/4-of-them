<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('author.list', ['data' => $this->appRepository->getAuthors()]);
    }

     /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('author.detail', ['author' =>  $this->appRepository->getAuthor($id)]);
    }

    public function destroy($id)
    {
        $this->appRepository->authorDelete($id);
        return redirect()->action('App\Http\Controllers\AuthorController@index');
    }
}
