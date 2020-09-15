<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
</head>
<body>
    @include('layouts.navigation')

    @yield('main')

    @include('layouts.footer')
    @section('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    @show

</body>
</html>
