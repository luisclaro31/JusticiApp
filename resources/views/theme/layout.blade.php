<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="Lawyers App">
            <meta name="author" content="Lawyers App">
            <title>JusticiApp</title>
            @include('theme.head.style')
        </head>
        <body>
        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                @include('theme.header.menu_principal')
                <div class="navbar-default sidebar" role="navigation">
                    @include('theme.body.menu_left')
                </div>
            </nav>
            <div id="page-wrapper">
                @yield('content')
            </div>
        </div>
        @include('theme.footer.script')
        @yield('script')
        </body>
    </html>