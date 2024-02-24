@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/verify.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-12 mx-auto">
            <div class="card py-4">
                <div class="card-body">
                    @if (session('status') == 'verification-link-sent')
                        <div class="alert alert-success text-center">A new email verification link has been emailed to you!</div>
                    @endif
                    <div class="text-center mb-5">
                        <h3>メール認証のお願い</h3>
                        <p>ご登録ありがとうございます！<br>
                        ご入力いただいたメールアドレスへ認証リンクを送信しましたので、クリックして認証を完了させてください。<br>
                        もし、認証メールが届かない場合は再送させていただきます。</p>
                    </div>
                    <form method="POST" action="{{ route('verification.send') }}" class="text-center">
                        @csrf
                        <button type="submit" class="btn btn-primary">メールを再送信する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection