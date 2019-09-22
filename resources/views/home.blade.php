@extends('layout.layout')
@section('title', 'Home page')
@section('main')
@include('layout.nav')

    <div class="container">
        <div class="row">
            @if(Session::has('loginSuccessfully')) 
                <div class="alert alert--green">{{ Session::get('loginSuccessfully') }}</div>  
            @endif
        </div>
    </div>

@endsection
