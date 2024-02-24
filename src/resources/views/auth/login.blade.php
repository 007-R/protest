@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class='login'>
    <div class='login_title'><span>Login</span></div>
    <form class='login-form' method='post' action='/login'>
        @csrf
        <div class='input_space'>
        <div class='email_input'>
            <input name='email' type='email' placeholder='Email', value="{{old('email')}}">
        </div>
        </div>
        <div class="form__error">
            @error('email')
                {{ $message }}
            @enderror
        </div>
        <div class='input_space'>
        <div class='password_input'>
            <input name='password' type='password' placeholder='Password'>
        </div>
        </div>
        <div class="form__error">
            @error('password')
                {{ $message }}
            @enderror
        </div>
        <div class='button'>
            <button type='submit'>ログイン</button>
        </div>
    </form>
</div>
@endsection