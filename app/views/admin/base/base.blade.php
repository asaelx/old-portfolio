<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - @yield('title')</title>
    {{HTML::style('assets/css/reset.css')}}
    {{HTML::style('assets/css/font-awesome.css')}}
    {{HTML::style('assets/css/admin.css')}}
    <base href="{{URL::to('/')}}">
</head>
<body>

@yield('topbar')
@yield('content')

{{HTML::script('assets/js/jquery.min.js')}}
{{HTML::script('assets/js/jquery.autosize.min.js')}}
{{HTML::script('assets/js/admin.js')}}
</body>
</html>