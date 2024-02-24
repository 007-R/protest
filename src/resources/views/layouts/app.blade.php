<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        @guest
        <!-- ハンバーガーメニュー部分 -->
        <div class="nav">
            <!-- ハンバーガーメニューの表示・非表示を切り替えるチェックボックス -->
            <input id="drawer_input" class="drawer_hidden" type="checkbox">
            <!-- ハンバーガーアイコン -->
            <label for="drawer_input" class="drawer_open"><span></span></label>
            <!-- メニュー -->
            <nav class="nav_content">
                <ul class="nav_list">
                    <li class="nav_item"><a href="/">Home</a></li>
                    <li class="nav_item"><a href="/register">Registration</a></li>
                    <li class="nav_item"><a href="/login">Login</a></li>
                </ul>
            </nav>
        </div>
        @endguest
        @auth
        <div class="nav">
            <!-- ハンバーガーメニューの表示・非表示を切り替えるチェックボックス -->
            <input id="drawer_input" class="drawer_hidden" type="checkbox">
            <!-- ハンバーガーアイコン -->
            <label for="drawer_input" class="drawer_open"><span></span></label>
            <!-- メニュー -->
            <nav class="nav_content">
                <ul class="nav_list">
                    <li class="nav_item"><a href="/">Home</a></li>
                    <li class="nav_item">
                        <form class='form' action='/logout' method='post'>
                        @csrf
                        <button class="logout_button" type='submit'><a>Logout</a></button></form>
                    </li>
                    <li class="nav_item">
                        <a href='/mypage'>Mypage</a>
                    </li>
                </ul>
            </nav>
        </div>
        @endauth

        <div class="logo">Rese</div>
    </header>
</body>
<main>
    @yield('content')
</main>

</html>