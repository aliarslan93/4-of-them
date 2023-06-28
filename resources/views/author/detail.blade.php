@extends('layout.app')
@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="mb-3">
            <label class="fw-bold">{!! __('Author Name') !!}:</label> <strong>{!! $author->first_name !!}</strong>
        </div>
        <div class="mb-3">
            <label class="fw-bold">{!! __('Author Surname') !!}</label> <strong>{!! $author->last_name !!}</strong>
        </div>

        <div class="row">
            @if (session()->has('status'))
                <div class="alert alert-danger" role="alert">
                    {{ session()->get('status') }}
                </div>
            @endif
            <div class="mb-3">
                <a class="btn btn-danger btn-sm float-end {!! count($author->books) ? 'disabled' : '' !!}" href="{!! route('author.destroy', $author->id) !!}"
                    onclick="event.preventDefault();
                                             document.getElementById('author-delete').submit();">
                    <form id="author-delete" action="{!! route('author.destroy', $author->id) !!}" method="POST" class="d-none">
                        @csrf
                    </form>
                    {!! __('Delete') !!}
                </a>
            </div>

            <table class="table table-info">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Title</td>
                        <td>Release Date</td>
                        <td>Description</td>
                        <td>Isbn</td>
                        <td>Format</td>
                        <td>Number Of Pages</td>
                        <td>-</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($author->books as $book)
                        <tr class="table-info">
                            <td class="table-light">{!! $book->title !!}</td>
                            <td class="table-light">{!! $book->release_date !!}</td>
                            <td class="table-light">{!! $book->description !!}</td>
                            <td class="table-light">{!! $book->isbn !!}</td>
                            <td class="table-light">{!! $book->format !!}</td>
                            <td class="table-light">{!! $book->number_of_pages !!}</td>
                            <td class="table-light">
                                <a class="btn btn-sm btn-danger" href="{!! route('book.destroy', $book->id) !!}">
                                    {!! __('Delete') !!}
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
@endsection
