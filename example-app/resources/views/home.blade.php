@extends('layouts.portfolio')
@section('title', 'Student software developer portfolio')
@section('content')


<section class="hero wrap" aria-labelledby="hero-title">
<div class="eyebrow"><span>STUDENT SOFTWARE DEVELOPER / DIGITAL EXPLORER</span><span>PORTFOLIO </span></div>
<div class="dark-heading"><h1 id="hero-title">CREATIVE<br><span>AFTER HOURS.</span></h1><span class="handnote">a curious mind,<br>a colourful world.</span><span class="dark-star" aria-hidden="true">✳</span></div>
<div class="dark-visual"><img src="{{ asset('images/night-gallery.png') }}" alt="A dimly lit gallery filled with photography and art"><div class="image-shade"></div><span class="image-label">A DIFFERENT PERSPECTIVE.<br>THE SAME CURIOUS MIND.</span><span class="vertical-label">VISUAL NOTES / NO. 002</span><a class="dark-explore" href="#work">EXPLORE THE WORK <span>↘</span></a></div>
<div class="dark-intro"><span class="status">● OPEN TO NEW IDEAS</span><p>A student software developer exploring design,<br>development and everything that catches the eye.</p><span>SCROLL TO DISCOVER ↓</span></div>
</section>

<div class="ticker" aria-hidden="true">CURIOUS BY NATURE <span>✳</span> CREATIVE AT HEART <span>✳</span> ALWAYS EXPLORING <span>✳</span></div>
<section class="work wrap" id="work">
<div class="section-heading"><div><span class="eyebrow">01 / MY PROJECTS</span><h2>PROJECTS I’VE MADE.</h2></div><span>PROJECT DETAILS COMING SOON</span></div>
<div class="projects">
@foreach ([1, 2] as $number)
<article><a class="project-preview" href="{{ route('portfolio') }}" aria-label="Explore project {{ $number }} and all projects">@if($number === 1)
<div class="project-placeholder project-screenshot"><span class="eyebrow">PROJECT / 01</span><img src="{{ asset('images/tradesphere-homepage.png') }}" alt="TradeSphere homepage with community navigation and the headline Patience is a position too" loading="lazy" width="2302" height="1338"></div>
@else
<div class="project-placeholder"><span class="eyebrow">PROJECT / 0{{ $number }}</span><span class="placeholder-symbol" aria-hidden="true">✳</span><span>Project image coming soon</span></div>
@endif
<div class="project-caption"><h3>@if($number === 1) TradeSphere @else Project {{ $number }} — title coming soon @endif</h3><span aria-hidden="true">↗</span></div></a><p class="project-summary">@if($number === 1) TradeSphere is a welcoming community and learning platform for traders worldwide, with courses and a social feed to ask questions, share trades and learn together. @else A short description of what I made and the tools I used will go here. @endif</p></article>
@endforeach
</div>
<a class="section-link" href="{{ route('portfolio') }}">View all projects <span>↗</span></a>
</section>
<div class="home-after-projects wrap"><section class="about home-about" id="about"><span class="eyebrow">02 / BEHIND THE IDEAS</span><h2>ALWAYS CURIOUS. ALWAYS CREATING.</h2><div><p>As a student software developer, I use this portfolio to share what I am learning about how things look, feel and work. From the first sketch to the final interaction, every detail is a chance to try something new.</p></div><a class="section-link" href="{{ route('about') }}">More about me <span>↗</span></a>
</section>
<div class="home-profile-grid"><section class="cv-section home-skills" id="skills" aria-labelledby="skills-title">
<span class="eyebrow">03 / WHAT I BRING</span><h2 id="skills-title">SKILLS & INTERESTS.</h2>
@include('partials.skills', ['skillPrefix' => 'home'])
<a class="section-link" href="{{ route('skills') }}">Explore my skills <span>↗</span></a>
</section>
<section class="cv-section home-background" id="experience" aria-labelledby="experience-title">
<span class="eyebrow">04 / MY BACKGROUND</span><h2 id="experience-title">EXPERIENCE & EDUCATION.</h2>
<p class="cv-note">I study MBO 4 Software Development at ROCvA Zuid-Oost, following earlier studies at BIT-Academy and Bredero Mavo. Alongside my studies, I work as a server at Soju Bar, building on retail experience at Etos and Dirk van den Broek.</p>
<a class="section-link" href="{{ route('experience') }}">View my background <span>↗</span></a>
</section>
</div><section class="contact home-contact" id="contact"><span class="eyebrow">05 / THE NEXT CHAPTER</span><h2>LET’S MAKE AN IMPRESSION.</h2><p>Based in Amsterdam. Get in touch by email or phone, or find me on LinkedIn and GitHub.</p><a href="{{ route('contact') }}">Get in touch <span>↗</span></a></section>

</div>
@endsection