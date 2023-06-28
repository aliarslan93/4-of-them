@extends('layout.app')
@section('css')
@endsection

@section('content')
    <div class="container">

        <div class="row d-flex justify-content-center align-items-center login-box">
            <div class="col-lg-6">
                <h1 class="text-center mb-3">{!! __('Welcome to Login') !!} </h1>
            </div>
            <div class="col-lg-6 ">
                @if (session()->has('status'))
                    <div class="alert alert-warning" role="alert">
                        {{ session()->get('status') }}
                    </div>
                @endif
                <form method="POST" action="{!! route('login') !!}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="{!! __('E-Mail') !!}" name="email" />
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="{!! __('Password') !!}" name="password" />
                    </div>
                    <button class="btn btn-secondary w-25 float-end">{!! __('Login') !!}</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
