@extends('layouts.portfolio')
@section('title', 'Photography')
@section('content')
<section class="page-intro wrap">
<a class="breadcrumb" href="{{ route('home') }}">Home</a><span class="breadcrumb"> / </span><a class="breadcrumb" href="{{ route('about') }}">About me</a><span class="breadcrumb"> / Photography</span>
<p class="eyebrow">PHOTOGRAPHY / THROUGH MY LENS</p>
<h1>PHOTOGRAPHY<span class="page-dot">.</span></h1>
<p class="page-lead">From the action on the pitch to the personality behind a portrait. Explore my photos, one album at a time.</p>
</section>
<div class="page-content wrap">
@foreach($sections as $section)
<section class="photography-section" aria-labelledby="{{ $section['category'] }}-heading">
<div class="section-heading"><div><span class="eyebrow">{{ $section['category'] === 'football' ? 'MATCHDAY / MY PHOTOS' : 'PEOPLE / MY PHOTOS' }}</span><h2 id="{{ $section['category'] }}-heading">{{ $section['title'] }}</h2></div></div>
<p>Choose an album to see all the pictures.</p>
<div class="football-albums">
@foreach($section['albums'] as $album)
<a class="football-album" href="{{ route('photography.'.$section['category'], ['album' => $album['name']]) }}">
<img src="{{ asset($album['cover']) }}" alt="{{ $section['title'] }} — {{ $album['name'] }}" loading="lazy">
<div class="football-album-info"><span class="eyebrow">PHOTO ALBUM</span><h3>{{ $album['name'] }}</h3><span>{{ $album['count'] }} photos <span aria-hidden="true">↗</span></span></div>
</a>
@endforeach
</div>
</section>
@endforeach
<a class="section-link" href="{{ route('about') }}">Back to about me <span aria-hidden="true">↗</span></a>
</div>
@endsection
