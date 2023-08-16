<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;600&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Bulletin-Board</title>
</head>

<body>
    <header class="header">
        <div class="header_content">
            <h1><a href="{{ route('top') }}"><img class="logo_icon" src="{{ asset('image/syuriken.svg') }}" alt="KAWARA-BAN">KAWARA-BAN</a></h1>
            <span class="deco_arrow"></span>
            <h2>@yield('title')</h2>
        </div>
        <div class="header_content">
            <a href="{{ route('logout') }}">ログアウト</a>
        </div>
    </header>

    <main>
        <section class="wrapper_login container">
            @yield('content')
        </section>
    </main>
    <footer class="footer">
        <small>PRACTICE: Bulletin Board by t-erina</small>
        <div id="js_scrollUpBtn" class="scrollUp_btn">
            <span>TOP</span>
        </div>
    </footer>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>