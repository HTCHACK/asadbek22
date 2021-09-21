<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('title')
    @include('layouts.head')
    <livewire:styles />
</head>

<body>
    @yield('content')
    @include('layouts.scripts')
    <livewire:scripts />
</body>

</html>
