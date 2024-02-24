@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class='message'>
    <p class='thanks_message'>会員登録ありがとうございます</p>
    <a class='login_button' href='/'>ホーム画面へ</a>
</div>


@endsection