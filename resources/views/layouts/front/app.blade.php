<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.front.head')
</head>
<body>
    @include('layouts.front.preloader')

    @include('layouts.front.navbar')
    
    @yield('content')

    @include('layouts.front.footer')

    @include('layouts.front.scripts')
</body>
</html>