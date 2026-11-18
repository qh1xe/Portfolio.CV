<div class="archive-art archive-art--{{ $project['category'] }}">
    @if (isset($project['image']))
        <img src="{{ asset($project['image']) }}" alt="{{ $project['alt'] }}" width="2302" height="1338" loading="lazy">
    @else
        <span aria-hidden="true">{{ $project['art'] }}</span>
    @endif
</div>
