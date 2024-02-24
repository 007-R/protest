@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login_for_master_admin.css') }}">
@endsection

@section('content')
<div class='login'>
    <div class='login_title'><span>Login for administrators</span></div>
    <form class='login-form' method='post' action='/admin/login'>
        @csrf
        <div class='email_input'>
            <input name='userid' placeholder='ID', value="{{old('email')}}">
        </div>
        <div class="form__error">
            @error('email')
                {{ $message }}
            @enderror
        </div>
        <div class='password_input'>
            <input name='password' type='password' placeholder='Password'>
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