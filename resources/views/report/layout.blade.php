<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>Example 1</title>
            @include('report.head.style')
        </head>
        <body>
            <header class="clearfix">
                @include('report.header.header')
            </header>
            <main>
                @yield('content')
            </main>
            @include('report.footer.footer')
        </body>
    </html>