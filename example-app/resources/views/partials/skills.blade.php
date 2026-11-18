@php
$skillGroups = [
    'Coding skills' => [
        ['HTML', 'Learning to structure web pages with semantic markup.', 35],
        ['CSS', 'Practising styling, layouts and responsive design.', 35],
        ['JavaScript', 'Learning to add interactions and dynamic behaviour.', 35],
        ['PHP', 'Developing my understanding of server-side programming.', 35],
        ['Laravel & databases', 'Learning Blade templates, application structure and SQL.', 35],
    ],
    'Soft skills' => [
        ['Adaptability', 'Adapting to different tasks and being open to new ideas.', 70],
        ['Creativity', 'Exploring different approaches and turning ideas into projects.', 70],
        ['Communication', 'Communicating clearly and listening to other people’s ideas.', 90],
        ['Teamwork', 'Working with others and bringing shared ideas into my work.', 85],
    ],
];
@endphp
<p class="skill-rating-note">My current skill levels on a scale of 1–100. Coding skills reflect my progress as a student; soft skill ratings are approximated from my CV.</p>
<div class="capability-groups">
@foreach ($skillGroups as $group => $skills)
<details class="capability-group">
<summary>{{ $group }}</summary>
@foreach ($skills as [$name, $description, $rating])
<div class="capability-item">
<div class="capability-label"><span id="{{ $skillPrefix }}-skill-{{ $loop->parent->index }}-{{ $loop->index }}">{{ $name }}</span><span class="capability-value">{{ $rating }} / 100</span></div>
<div class="capability-track" role="progressbar" aria-labelledby="{{ $skillPrefix }}-skill-{{ $loop->parent->index }}-{{ $loop->index }}" aria-valuemin="1" aria-valuemax="100" aria-valuenow="{{ $rating }}" aria-valuetext="{{ $rating }} out of 100"><span style="width:{{ $rating }}%"></span></div>
<p>{{ $description }}</p>
</div>
@endforeach
</details>
@endforeach
</div>
<section class="skill-interests" aria-labelledby="{{ $skillPrefix }}-interests">
<span class="eyebrow">WHAT SPARKS MY CURIOSITY</span>
<h3 id="{{ $skillPrefix }}-interests">Interests</h3>
<p>Exploring the creative side of software development, from how a website looks to how people use it.</p>
<ul class="interest-list"><li>Web development</li><li>Visual design</li><li>Typography & colour</li><li>Creative exploration</li></ul>
</section>
