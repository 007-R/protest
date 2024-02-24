@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/done.css') }}">
@endsection

@section('content')
<div class='message'>
    <p class='thanks_message'>{{$message}}ありがとうございます</p>
    <a class='return_button' href='/'>戻る</a>
</div>


@endsection