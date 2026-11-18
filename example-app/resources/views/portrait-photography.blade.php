@extends('layouts.portfolio')
@section('title', 'Portrait photography')
@section('content')
<section class="page-intro wrap">
<a class="breadcrumb" href="{{ route('home') }}">Home</a><span class="breadcrumb"> / </span><a class="breadcrumb" href="{{ route('about') }}">About me</a><span class="breadcrumb"> / Portrait photography</span>
@if($album)<span class="breadcrumb"> / {{ $album }}</span>@endif
<p class="eyebrow">PHOTOGRAPHY / THROUGH MY LENS</p>
<h1>PORTRAIT<br>PHOTOGRAPHY<span class="page-dot">.</span></h1>
<p class="page-lead">A collection of portraits capturing personality, expression and moments worth remembering.</p>
</section>
<div class="page-content wrap">
<section aria-labelledby="football-gallery-title">
<div class="section-heading"><div><span class="eyebrow">PORTRAITS / MY PHOTOS</span><h2 id="football-gallery-title">PEOPLE & PERSONALITY.</h2></div><span>PORTRAIT COLLECTION</span></div>
@if($album === null && $albums->isNotEmpty())
<p>Choose an album to see all the pictures.</p>
<div class="football-albums">
@foreach($albums as $item)
<a class="football-album" href="{{ route('photography.portraits', ['album' => $item['name']]) }}">
<img src="{{ asset($item['photos']->first()) }}" alt="Portraits from {{ $item['name'] }}" loading="lazy">
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
<figure><a href="{{ asset($photo) }}" aria-label="View portrait photograph {{ $loop->iteration }} in full size"><img src="{{ asset($photo) }}" alt="Portrait photograph by Chloe Waldron, image {{ $loop->iteration }}" loading="lazy"></a><figcaption>PORTRAIT NOTES / {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</figcaption></figure>
@endforeach
</div>
@include('partials.photo-viewer')
@else
<div class="football-gallery-empty"><span class="eyebrow">A LOOK THROUGH MY LENS</span><h3>Portraits coming soon.</h3><p>This is where I’ll share my favourite portrait photographs.</p></div>
@endif
<a class="section-link" href="{{ route('about') }}">Back to about me <span aria-hidden="true">↗</span></a>
</section>
</div>
@endsection

