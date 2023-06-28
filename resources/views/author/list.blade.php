@extends('layout.app')

@section('css')
@endsection

@section('content')
    <div class="row d-flex justify-content-center align-items-center">
        <table class="table table-info">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Last Name</td>
                    <td>Gender</td>
                    <td>Place of Birth</td>
                    <td>-</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data->items as $author)
                    <tr class="table-info">
                        <td class="table-light">{!! $author->first_name !!}</td>
                        <td class="table-light">{!! $author->last_name !!}</td>
                        <td class="table-light">{!! $author->gender !!}</td>
                        <td class="table-light">{!! $author->place_of_birth !!}</td>

                        <td class="table-light">
                            <a class="btn btn-sm btn-success" href="{!! route('author.detail', $author->id) !!}">
                                {!! __('Show') !!}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
@endsection
