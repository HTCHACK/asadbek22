<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('title')
    @yield('head')
    <livewire:styles />
</head>

<body>
    @yield('content')
    @yield('js')
    <livewire:scripts />
</body>

</html>
