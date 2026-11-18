<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="A student software developer portfolio sharing projects, learning and creative exploration.">
<title>@yield('title', 'Student software developer portfolio') — After hours</title>
<link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
</head>
<body class="dark">
<a class="skip" href="#main">Skip to content</a>
<header class="nav wrap">
<a class="wordmark" href="{{ route('home') }}" aria-label="Portfolio home">folio<span>✳</span></a>
<nav aria-label="Main navigation">
@foreach (['home' => 'Home', 'about' => 'About me', 'portfolio' => 'Projects', 'skills' => 'Skills', 'experience' => 'Experience & education', 'contact' => 'Contact'] as $name => $label)
<a href="{{ route($name) }}" @if(request()->routeIs($name)) aria-current="page" @endif class="{{ $name === 'contact' ? 'nav-contact' : '' }}">{{ $label }}</a>
@endforeach
</nav>

</header>
<main id="main">
@yield('content')
</main><footer class="wrap"><a class="wordmark" href="{{ route('home') }}">folio<span>✳</span></a><span>A LITTLE DESIGN. A LOT OF PERSONALITY.</span><span>AFTER HOURS / CV & PORTFOLIO</span></footer>
</body></html>
