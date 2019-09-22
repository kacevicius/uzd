@extends('layout.layout')
@section('title', 'Login')
@section('main')

    <div class="section-login">

        <form class="login-form u-m-2 " action="/login" method="post">
            @csrf
            <h4 class="login-form__heading">Login form</h4>
            @if(Session::has('loginError')) 
                <p class="u-error-text u-m-l-2 u-m-t-05">{{ Session::get('loginError') }}</p>
            @endif
            <div class="login-form__group" >
                <input type="email" name="username" class="login-form__input {{$errors->first('username') || Session::has('loginError') ? 'u-error-border' : '' }}" placeholder="Username" required>
                <i class="login-form__icon far fa-user"></i>
                @if($errors->first('username')) 
                    <p class="u-error-text u-m-l-2 u-m-t-05">{{$errors->first('username')}}<p> 
                @endif
            </div>
            <div class="login-form__group" >
            <input type="password" name="password" class="login-form__input {{$errors->first('password') || Session::has('loginError')  ? 'u-error-border' : '' }}" placeholder="Password" required>
                <i class="login-form__icon fas fa-lock"></i>
                @if($errors->first('password')) 
                    <p class="u-error-text u-m-l-2 u-m-t-05">{{$errors->first('password')}}<p> 
                @endif
            </div>
            <button class="btn btn--purple u-m-2">Singn In</button>
        </form>
    
    </div>


@endsection
