<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">

        <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">

        <meta property="og:title" content="{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ $page->getUrl() }}"/>
        <meta property="og:description" content="{{ $page->siteDescription }}" />

        <title>{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}</title>

        <link rel="home" href="{{ $page->baseUrl }}">

        <link rel="apple-touch-icon" sizes="180x180" href="/assets/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="/assets/favicon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon-16x16.png">
        <link rel="icon" href="/assets/favicon.ico">
        <meta name="apple-mobile-web-app-title" content="{{ $page->siteName }}">
        <meta name="msapplication-TileColor" content="#223CE6">
        <meta name="msapplication-TileImage" content="/assets/mstile-150x150.png">
        <meta name="application-name" content="{{ $page->siteName }}">

        @stack('head')
    </head>
    <body class="font-sans text-black leading-normal">

        @yield('body')

        {{-- <script src="{{ mix('js/main.js', 'assets/build') }}"></script> --}}

        @stack('scripts')
    </body>
</html>
