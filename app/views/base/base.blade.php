<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Asael Jaimes">
    <meta name="description" content="Portafolio personal de Asael Jaimes">
    <title>Asael Jaimes - @yield('title')</title>
    {{HTML::style('assets/css/reset.css')}}
    {{HTML::style('assets/css/font-awesome.css')}}
    {{HTML::style('assets/css/handsome.css')}}
</head>
<body>

@yield('sidebar')
@yield('content')

{{HTML::script('assets/js/instafeed.min.js')}}
{{HTML::script('assets/js/magic.js')}}
</body>
</html>