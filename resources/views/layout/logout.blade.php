<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;600&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Bulletin-Board</title>
</head>

<body>
    <main>
        <section class="wrapper_logout col-3">
            <div class="title_logout">
                <div class="logo_container">
                    <img class="logo_login" src="{{ asset('image/syuriken.svg') }}" alt="KAWARA-BAN">
                </div>
                <h1>KAWARA-BAN</h1>
                <h2>@yield('title')</h2>
            </div>

            <div class="container_logout">
                @yield('content')
            </div>
        </section>
    </main>

    <footer class="footer">
        <small>PRACTICE: Bulletin Board by t-erina</small>
    </footer>
</body>

</html>