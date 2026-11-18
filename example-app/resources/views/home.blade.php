@extends('layouts.portfolio')
@section('title', 'Creative After Hours')
@section('content')
@php($projects = config('portfolio.projects'))
<section class="editorial-hero wrap" aria-labelledby="hero-title">
    <div class="hero-copy">
        <p class="eyebrow">SOFTWARE DEVELOPMENT · AMSTERDAM</p>
        <h1 id="hero-title">Creative <em>after</em><br>Hours<span class="page-dot">.</span></h1>
        <p class="page-lead">I’m Chloe, a student software developer at ROCvA Zuidoost. I build web applications and explore how design can make them easier to use.</p>
        <div class="hero-actions">
            <a class="action action-primary" href="#work">Explore projects <span aria-hidden="true">↓</span></a>
            <a class="action" href="https://github.com/qh1xe">GitHub <span aria-hidden="true">↗</span></a>
        </div>
    </div>
    <div class="hero-panel">
        <div class="hero-panel-heading"><span class="eyebrow">CHLOE / QH1XE</span><span class="page-dot" aria-hidden="true">✳</span></div>
        <dl>
            <div><dt>Location</dt><dd>Amsterdam, Netherlands</dd></div>
            <div><dt>Education</dt><dd>Software Development · ROCvA Zuidoost</dd></div>
            <div><dt>Focus</dt><dd>Web applications & interactive interfaces</dd></div>
        </dl>
    </div>
</section>

<section id="work" class="editorial-section wrap" aria-labelledby="work-title">
    <div class="section-heading">
        <h2 id="work-title">Featured projects</h2>
        <a class="section-link" href="{{ route('portfolio') }}">View project archive <span aria-hidden="true">↗</span></a>
    </div>
    <div class="featured-project">
        @include('partials.project-art', ['project' => $projects[0]])
        <div class="featured-copy">
            <span class="eyebrow">COMMUNITY & LEARNING PLATFORM</span>
            <h3>{{ $projects[0]['title'] }}</h3>
            <p>{{ $projects[0]['description'] }}</p>
            <a class="action" href="{{ route('portfolio') }}#tradesphere">Explore TradeSphere <span aria-hidden="true">↗</span></a>
        </div>
    </div>
    <div class="project-index">
        @foreach (array_slice($projects, 1, 3) as $project)
            <a href="{{ route('portfolio') }}#{{ $project['id'] }}">{{ $project['title'] }} <span aria-hidden="true">↗</span></a>
        @endforeach
    </div>
</section>

<section class="editorial-section wrap" aria-labelledby="trajectory-title">
    <div class="section-heading"><h2 id="trajectory-title">Software & academic trajectory</h2></div>
    <div class="trajectory-grid">
        <article><span class="eyebrow">DEVELOPMENT</span><h3>Skills & interests</h3><p>Web development, interface design and the tools I’m learning through my projects.</p><a class="section-link" href="{{ route('skills') }}">Explore my skills ↗</a></article>
        <article><span class="eyebrow">EDUCATION & EXPERIENCE</span><h3>Curriculum vitae</h3><p>My software development studies at ROCvA Zuidoost and my experience in hospitality and retail.</p><a class="section-link" href="{{ route('experience') }}">View my CV ↗</a></article>
        <article><span class="eyebrow">PHOTOGRAPHY</span><h3>Through the lens</h3><p>Sports photography and portraits from my personal collection.</p><a class="section-link" href="{{ route('photography') }}">Browse photography ↗</a></article>
    </div>
    <a class="section-link" href="{{ route('about') }}">More about me ↗</a>
</section>
<section class="editorial-section wrap home-inquiry" aria-labelledby="inquiry-title">
    <h2 id="inquiry-title">Let’s talk about what you’re building.</h2>
    <a class="action action-primary" href="{{ route('contact') }}">Get in touch <span aria-hidden="true">↗</span></a>
</section>
@endsection
