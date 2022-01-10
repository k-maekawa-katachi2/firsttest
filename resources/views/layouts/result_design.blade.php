<html lang="ja">

<head>
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="{{ asset('css/result_design.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        @yield('header')
    </header>
    <main>
        <div class="container">
            <div class="row mt-3">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" name="logout">
                    @csrf
                    <p style="text-align: right;">
                        <a href="javascript:document.logout.submit()">ログアウトする</a>
                    </p>
                </form>
            </div>

            <div class="content">

                <div class="row mt-5 ml-3">
                    @yield('content')

                </div>
            </div>
            <div class="main_footer mt-5">
                @yield('main_footer')
            </div>
        </div>
    </main>
    <footer>
        <p>author：kazunori maekawa</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    
</body>

</html>