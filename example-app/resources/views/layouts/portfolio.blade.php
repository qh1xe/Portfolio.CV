<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Chloe’s software development and photography portfolio.">
    <title>@yield('title', 'Student software developer portfolio') — After Hours</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
    <script src="{{ asset('js/portfolio.js') }}" defer></script>
</head>
<body class="dark">
@php
$navigation = ['home' => 'Home', 'portfolio' => 'Projects', 'about' => 'About', 'skills' => 'Skills', 'experience' => 'CV', 'photography' => 'Photography', 'contact' => 'Contact'];
$mobileNavigation = ['home' => ['Home', '⌂'], 'portfolio' => ['Projects', '▤'], 'experience' => ['CV', '≡'], 'contact' => ['Contact', '@']];
@endphp
<a class="skip" href="#main">Skip to content</a>
<header class="site-header">
    <div class="nav wrap">
        <a class="wordmark" href="{{ route('home') }}" aria-label="Portfolio home">folio<span aria-hidden="true">✳</span></a>
        <nav class="desktop-navigation" aria-label="Main navigation">
            @foreach ($navigation as $name => $label)
                <a href="{{ route($name) }}" @if(request()->routeIs($name, $name.'.*')) aria-current="page" @endif>{{ $label }}</a>
            @endforeach
        </nav>
        <details class="mobile-menu">
            <summary>Menu</summary>
            <nav aria-label="All pages">
                @foreach ($navigation as $name => $label)
                    <a href="{{ route($name) }}" @if(request()->routeIs($name, $name.'.*')) aria-current="page" @endif>{{ $label }}</a>
                @endforeach
            </nav>
        </details>
    </div>
</header>
<main id="main">
    @yield('content')
</main>
<footer class="wrap site-footer">
    <a class="wordmark" href="{{ route('home') }}">folio<span aria-hidden="true">✳</span></a>
    <span>CHLOE · SOFTWARE DEVELOPMENT · AMSTERDAM</span>
    <a href="https://github.com/qh1xe">GitHub ↗</a>
</footer>
<nav class="mobile-navigation" aria-label="Quick navigation">
    @foreach ($mobileNavigation as $name => [$label, $icon])
        <a href="{{ route($name) }}" @if(request()->routeIs($name)) aria-current="page" @endif>
            <span aria-hidden="true">{{ $icon }}</span>{{ $label }}
        </a>
    @endforeach
</nav>
</body>
</html>
