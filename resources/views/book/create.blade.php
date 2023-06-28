@extends('layout.app')
@section('css')
@endsection

@section('content')
    <div class="container">

        @if (session()->has('status'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('status') }}
            </div>
        @endif
        <form action="{!! route('book.store') !!}" class="row" method="POST">
            @csrf
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="{!! __('Author') !!}" class="form-label">{!! __('Author') !!}</label>
                    <select name="author" class="form-control" id="{!! __('Author') !!}">
                        @foreach ($authors->items as $author)
                            <option value="{!! $author->id !!}">{!! $author->first_name !!} {!! $author->last_name !!}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="{!! __('Title') !!}" class="form-label">{!! __('Title') !!}</label>
                    <input type="text" class="form-control" id="{!! __('Title') !!}"
                        placeholder="{!! __('Title') !!}" name="title">
                </div>


                <div class="mb-3">
                    <label for="{!! __('Description') !!}" class="form-label">{!! __('Description') !!}</label>
                    <input type="text" class="form-control" id="{!! __('Description') !!}"
                        placeholder="{!! __('Description') !!}" name="description">
                </div>


                <div class="mb-3">
                    <label for="{!! __('Release Date') !!}" class="form-label">{!! __('Release Date') !!}</label>
                    <input type="datetime-local" class="form-control" id="{!! __('Release Date') !!}"
                        placeholder="{!! __('Release Date') !!}" name="release_date">
                </div>

            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="{!! __('ISBN') !!}" class="form-label">{!! __('ISBN') !!}</label>
                    <input type="text" class="form-control" id="{!! __('ISBN') !!}"
                        placeholder="{!! __('ISBN') !!}" name="isbn">
                </div>
                <div class="mb-3">
                    <label for="{!! __('Format') !!}" class="form-label">{!! __('Format') !!}</label>
                    <input type="text" class="form-control" id="{!! __('Format') !!}"
                        placeholder="{!! __('Format') !!}" name="format">
                </div>
                <div class="mb-3">
                    <label for="{!! __('Number Of Pages') !!}" class="form-label">{!! __('Number Of Pages') !!}</label>
                    <input type="number" class="form-control" name="number_of_pages" id="{!! __('Number Of Pages') !!}"
                        placeholder="{!! __('Number Of Pages') !!}">
                </div>
                <button class="btn btn-success float-end">{!! __('Save') !!}</button>
            </div>
        </form>
    </div>
@endsection

@section('js')
@endsection
