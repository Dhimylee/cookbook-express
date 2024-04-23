<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    
    @yield('style')
</head>
<body>
    <header>
        @include('components.header')
    </header>

    <main>
        @yield('content')
    </main>

    @yield('script')
</body>
</html>
