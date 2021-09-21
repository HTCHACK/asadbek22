<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('title')
    @include('layouts.head')
    @yield('js')
    <livewire:styles />
</head>

<body>
    <div class="preloader" id="preloader">
        <div class="loader">
            <svg class="spinner" viewBox="0 0 50 50">
                <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
            </svg>
        </div>
    </div>
    @if (Route::currentRouteName() != 'login')
        @include('layouts.menu')
    @endif
    @yield('content')
    @if (Route::currentRouteName() != 'login')
        @include('layouts.footer')
    @endif
    @include('layouts.scripts')
    <livewire:scripts />
</body>

</html>
