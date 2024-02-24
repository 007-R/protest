@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection


@section('content')
<div class='register-form'>
    <div class='register_title'><span>Registration</span></div>
    <form class='login-info' method='post' action='/register'>
        @csrf
        <div class='input_space'>
            <div class='name_input'>
                <input name='name' type='text' placeholder='Username' value="{{ old('name')}}">
            </div>
        </div>
        <div class="form__error">
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <div class='input_space'>
            <div class='email_input'>
                <input name='email' type='email' placeholder='Email' value="{{ old('email')}}">
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
        <div class=button>
            <button type='submit'>登録</button>
        </div>
    </form>
</div>
@endsection