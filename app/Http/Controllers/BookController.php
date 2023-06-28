<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create', ['authors' => $this->appRepository->getAuthors()]);
    }
    public function store(Request $request)
    {
        $book = $request->only(
            'author',
            'title',
            'description',
            'isbn',
            'format',
            'release_date',
            'number_of_pages',
        );
        $this->appRepository->addBook($book);
        return redirect()->back()->with('status','Book Added');
    }
    public function destroy($Id)
    {
        $this->appRepository->bookDelete($Id);
        return redirect()->back()->with('status','Book Deleted');
    }
}
