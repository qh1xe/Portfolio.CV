@extends('layouts.portfolio')
@section('title', 'Football photography')
@section('content')
<section class="page-intro wrap">
<a class="breadcrumb" href="{{ route('home') }}">Home</a><span class="breadcrumb"> / </span><a class="breadcrumb" href="{{ route('about') }}">About me</a><span class="breadcrumb"> / Football photography</span>
@if($album)<span class="breadcrumb"> / {{ $album }}</span>@endif
<p class="eyebrow">PHOTOGRAPHY / THROUGH MY LENS</p>
<h1>FOOTBALL<br>PHOTOGRAPHY<span class="page-dot">.</span></h1>
<p class="page-lead">A collection of moments I’ve captured while photographing football. The action, the atmosphere and the details from the sidelines.</p>
</section>
<div class="page-content wrap">
<section aria-labelledby="football-gallery-title">
<div class="section-heading"><div><span class="eyebrow">MATCHDAY / MY PHOTOS</span><h2 id="football-gallery-title">FROM THE SIDELINES.</h2></div><span>CANON EOS R50 / RF 75–300MM</span></div>
@if($album === null && $albums->isNotEmpty())
<p>Choose an album to see all the pictures.</p>
<div class="football-albums">
@foreach($albums as $item)
<a class="football-album" href="{{ route('photography.football', ['album' => $item['name']]) }}">
<img src="{{ asset($item['photos']->first()) }}" alt="Football photos from {{ $item['name'] }}" loading="lazy">
<div class="football-album-info"><span class="eyebrow">PHOTO ALBUM</span><h3>{{ $item['name'] }}</h3><span>{{ $item['photos']->count() }} photos <span aria-hidden="true">↗</span></span></div>
</a>
@endforeach
</div>
@elseif($album !== null && $photos->isNotEmpty())
<a class="section-link" href="{{ route('photography') }}">← All albums</a>
<h3>{{ $album }}</h3>
<p>Choose a photo to view it in full size.</p>
<div class="football-gallery">
@foreach($photos as $photo)
<figure><a href="{{ asset($photo) }}" aria-label="View football photograph {{ $loop->iteration }} in full size"><img src="{{ asset($photo) }}" alt="Football match photograph by Chloe Waldron, image {{ $loop->iteration }}" loading="lazy"></a><figcaption>SIDELINE NOTES / {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</figcaption></figure>
@endforeach
</div>
@include('partials.photo-viewer')
@else
<div class="football-gallery-empty"><span class="eyebrow">A LOOK THROUGH MY LENS</span><h3>Matchday photos coming soon.</h3><p>This is where I’ll share my favourite pictures from shooting football games.</p></div>
@endif
<a class="section-link" href="{{ route('about') }}">Back to about me <span aria-hidden="true">↗</span></a>
</section>
</div>
@endsection

