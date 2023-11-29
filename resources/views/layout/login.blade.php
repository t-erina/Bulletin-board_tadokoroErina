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
            <h1><a href="{{ route('top') }}"><img class="logo_icon" src="{{ asset('image/syuriken.svg') }}" alt="KAWARA-BAN"><span class="logo_text">KAWARA-BAN</span></a></h1>
            <span class="deco_arrow"></span>
            <h2>@yield('title')</h2>
        </div>
        <div class="header_content h_logout-btn">
            <a href="{{ route('logout') }}">ログアウト</a>
        </div>
        <button id="js_menuBtn" class="menu-btn">
            <i class="bi bi-three-dots-vertical menu-btn_inner"></i>
        </button>
    </header>

    <main>
        <section class="wrapper_login container">
            <div class="row">
                @yield('content')
                <div id="js_sideBar" class="container_side col-3">
                    <div class="sidebar_content d-grid gap-2">
                        <a class="btn btn-primary" href="{{ route('createPostForm') }}">投稿</a>
                        @can('admin')
                        <a class="btn btn-primary" href="{{ route('category') }}">カテゴリー管理</a>
                        @endcan
                    </div>

                    <div class="sidebar_content">
                        <p class="sidebar_content_title">検索</p>
                        <div class="search_content">
                            <input type="text" form="searchPost" name="keyword" value="{{ session()->get('keyword') }}" class="search_form_item">
                            <button form="searchPost" class="search_btn search_form_item"><i class="bi bi-search"></i></button>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" name="favorite_post" value="favorite_post" form="searchPost" class="btn btn-primary">いいねした投稿</button>
                            <button type="submit" name="auth_post" value="auth_post" form="searchPost" class="btn btn-primary">自分の投稿</button>
                        </div>
                    </div>

                    <div class="sidebar_content">
                        <p class="sidebar_content_title">カテゴリー</p>
                        @foreach($categories as $category)
                        <ul class="categoryList_main">
                            <li>
                                <div class="category_list">
                                    <span class="main_category_name bullet">{{ $category->main_category }}</span>
                                </div>
                                <ul class="categoryList_sub">
                                    @foreach($category->postSubCategories as $sub_category)
                                    <li class="categoryList_sub_item">
                                        <button type="submit" class="subCategory_btn category_btn" name="category_word" value="{{ $sub_category->sub_category }}" form="searchCategory">{{ $sub_category->sub_category }}</button>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                    <div class="sidebar_content s_logout-btn">
                        <a class="btn btn-danger d-grid gap-2" href="{{ route('logout') }}">ログアウト</a>
                    </div>
                </div>
            </div>
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
