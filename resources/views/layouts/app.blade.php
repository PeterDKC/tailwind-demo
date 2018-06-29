<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="flex flex-col" id="app">

        <div class="bg-brand-lightest mb-4 py-4">
            <div class="container mx-auto h-full">
                <a href="/" class="no-underline text-brand-dark p-2 bg-white hover:bg-brand-dark hover:text-white">
                    <i class="mdi mdi-tree"></i>
                    <span>{{ env('APP_NAME') }}</span>
                </a>
            </div>
        </div>

        <div class="container mx-auto h-full">

            {{-- @include('partials.alerts') --}}

            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
