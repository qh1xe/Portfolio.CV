@php
    $categories = config('portfolio.categories');
    $projects = collect(config('portfolio.projects'));
    $filters = ['all' => 'All ('.$projects->count().')'] + $categories;
@endphp
<nav class="archive-filters" aria-label="Filter projects">
    @foreach ($filters as $category => $label)
        <a data-filter="{{ $category }}" href="{{ $category === 'all' ? route('portfolio') : route('portfolio', ['category' => $category]) }}"
            @if ($activeCategory === $category) aria-current="page" @endif>{{ $label }}</a>
    @endforeach
</nav>
<p id="archive-status" class="sr-only" role="status"></p>
<div class="archive-grid">
    @foreach ($projects as $project)
        <article class="archive-card" id="{{ $project['id'] }}" data-project-category="{{ $project['category'] }}" @if ($activeCategory !== 'all' && $activeCategory !== $project['category']) hidden @endif>
            @include('partials.project-art', ['project' => $project])
            <div class="archive-card-content">
                <span class="eyebrow">{{ $categories[$project['category']] }}</span>
                <h2>{{ $project['title'] }}</h2>
                <p>{{ $project['description'] }}</p>
                <div class="tags" aria-label="Technologies">
                    @foreach ($project['tags'] as $tag)
                        <span>{{ $tag }}</span>
                    @endforeach
                </div>
                <div class="repository-links">
                    @foreach ($project['repositories'] as $label => $url)
                        <a class="section-link" href="{{ $url }}">{{ $label }} on GitHub <span aria-hidden="true">↗</span></a>
                    @endforeach
                </div>
                @if ($project['id'] === 'tradesphere')
                    @include('partials.tradesphere-details')
                @endif
            </div>
        </article>
    @endforeach
</div>
