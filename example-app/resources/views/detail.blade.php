@extends('layouts.portfolio')
@php
$titles = ['about' => 'About me', 'portfolio' => 'Projects I’ve Made', 'skills' => 'Skills & interests', 'experience' => 'Experience & education', 'contact' => 'Contact'];
$intros = ['about' => 'A student software developer with a curious mind, an eye for detail and a drive to keep learning.', 'portfolio' => 'A collection of my projects, the ideas behind them and what they do.', 'skills' => 'The skills I am developing as a student software developer, from first idea to final interaction.', 'experience' => 'The learning and experience behind the work.', 'contact' => 'Every new collaboration starts with a conversation.'];
@endphp
@section('title', $titles[$page])
@section('content')
<section class="page-intro wrap">
<a class="breadcrumb" href="{{ route('home') }}">Home</a><span class="breadcrumb"> / {{ $titles[$page] }}</span>
<p class="eyebrow">CV & PORTFOLIO / {{ strtoupper($page) }}</p>
<h1>{{ strtoupper($titles[$page]) }}<span class="page-dot">.</span></h1>
<p class="page-lead">{{ $intros[$page] }}</p>
</section>
<div class="page-content wrap">
@switch($page)
@case('about')
<section class="about-profile" aria-label="Personal profile">
<img class="profile-photo" src="{{ asset('images/chloe-profile.png') }}" alt="Chloe holding a bouquet of flowers on outdoor steps">
<div class="profile-info">
<span class="eyebrow">A LITTLE ABOUT ME</span>
<dl class="profile-facts">
<div><dt>Name</dt><dd>Chloe Waldron</dd></div>
<div><dt>Age</dt><dd>18</dd></div>
<div><dt>Location</dt><dd>Amsterdam, The Netherlands</dd></div>
<div><dt>Interests</dt><dd>Football, photography, gaming, LEGO & Pokémon cards</dd></div>
<div><dt>Languages</dt><dd>English, Dutch</dd></div>
</dl>
<p class="profile-intro">In my free time, I enjoy playing football and exploring photography. I also like playing video games, building LEGO sets and collecting Pokémon cards.</p>
</div>
</section>
<div class="detail-grid"><h2>FROM SMALL PIECES<br>TO BIG IDEAS.</h2><div><p>Some of my favourite things involve putting pieces together: building a LEGO set, adding to my Pokémon card collection or working on a website. I enjoy seeing something take shape, one piece at a time.</p><p>Photography gives me another way to be creative, especially when sport is involved. This portfolio brings that side of me together with the projects I am building as a software developer.</p><a class="section-link" href="{{ route('portfolio') }}">See what I’ve been building ↗</a></div></div>
<section class="about-pastimes" aria-labelledby="pastimes-heading">
<span class="eyebrow">OUTSIDE OF CODE</span>
<h2 id="pastimes-heading">HOW I SPEND MY FREE TIME.</h2>
<div class="pastime-grid">
<article><span class="eyebrow">01 / ON THE PITCH</span><h3>Football</h3><p>Playing football is one of my favourite ways to spend my free time. Sport is also a big part of what I enjoy photographing.</p>
<div class="pastime-faq" aria-label="Football questions">
<details><summary>How long have you been playing football?</summary><p>I started playing football when I was nine. I took a two-year break at 14 and have since returned to playing.</p></details>
<details><summary>What position do you play?</summary><p>I played in defence for around two and a half years before becoming a goalkeeper.</p></details>
</div></article>
<article class="pastime-photography"><span class="eyebrow">02 / BEHIND THE LENS</span><h3>Photography</h3><p>I love photography. It brings two of my interests together: sport and capturing moments through a camera.</p>
<div class="pastime-faq" aria-label="Photography questions">
<details><summary>What camera do you use?</summary><p>I use a Canon EOS R50.</p></details>
<details><summary>What lens do you use for sports photography?</summary><p>I use a Canon RF 75–300mm F4–5.6 lens.</p></details>
<details><summary>Which sports do you enjoy photographing?</summary><p>So far, I have mainly photographed football, but I would love to try photographing other sports too.</p></details>
</div><div><a class="section-link" href="{{ route('photography') }}">View my photography <span aria-hidden="true">↗</span></a>
</div></article>
<article><span class="eyebrow">03 / TIME TO PLAY</span><h3>Video games</h3><p>When I have some spare time, I enjoy playing video games. Gaming is another way I like to unwind away from my studies.</p>
<div class="pastime-faq" aria-label="Gaming questions">
<details><summary>What is your favourite video game?</summary><p>My favourite video game at the moment is Tom Clancy's Rainbow Six Siege.</p></details>
<details><summary>Which platform do you play on?</summary><p>I play on PC, but I also own an Xbox Series S.</p></details>
<details><summary>Do you prefer playing solo or with friends?</summary><p>I prefer playing with friends. Sharing the experience makes gaming much more fun for me.</p></details>
</div></article>
<article><span class="eyebrow">04 / BRICK BY BRICK</span><h3>LEGO</h3><p>I love building LEGO sets. Alongside my digital hobbies, I enjoy putting something together with my own hands.</p>
<div class="pastime-faq" aria-label="LEGO questions">
<details><summary>What are your favourite LEGO sets?</summary><p>My current favourites are the 2 Fast 2 Furious Nissan Skyline GT-R (R34) and the BMW M 1000 RR motorbike.</p></details>
<details><summary>What types of LEGO sets do you enjoy building?</summary><p>I enjoy building LEGO Technic and LEGO Botanicals sets.</p></details>
<details><summary>Which LEGO set would you love to build next?</summary><p>I would love to build the Landscape with Japanese Cherry Blossoms set.</p></details>
</div></article>
<article><span class="eyebrow">05 / IN MY COLLECTION</span><h3>Pokémon cards</h3><p>Collecting Pokémon cards is another hobby I love, alongside gaming and building LEGO.</p>
<div class="pastime-faq" aria-label="Pokémon card questions">
<details><summary>How long have you been collecting Pokémon cards?</summary><p>I collected Pokémon cards when I was younger and recently picked up the hobby again.</p></details>
<details><summary>What is your favourite card in your collection?</summary><p>I do not have one favourite at the moment, but I have a soft spot for the cute cards in my collection!</p></details>
<details><summary>Which cards would you love to collect next?</summary><p>I would love to collect more Chansey and Sylveon cards, with the aim of owning most of them.</p></details>
 </div></article>
</div>
</section>

@break
@case('portfolio')
<div class="project-list">
@foreach ([1, 2, 3] as $number)
<article class="project-detail">
@if($number === 1)
<div class="project-placeholder project-screenshot"><span class="eyebrow">PROJECT / 01</span><img src="{{ asset('images/tradesphere-homepage.png') }}" alt="TradeSphere homepage with community navigation and the headline Patience is a position too" loading="lazy" width="2302" height="1338"></div>
@else
<div class="project-placeholder" aria-label="Project image placeholder"><span class="eyebrow">PROJECT / 0{{ $number }}</span><span class="placeholder-symbol" aria-hidden="true">✳</span><span>Project image coming soon</span></div>
@endif

<div><span class="eyebrow">{{ $number === 1 ? 'COMMUNITY / LEARNING PLATFORM' : 'PROJECT DETAILS COMING SOON' }}</span><h2>@if($number === 1) TradeSphere @else Project {{ $number }} — title coming soon @endif</h2>@if($number === 1)
<p>TradeSphere is a community and learning platform that brings traders from around the world together to help each other, share ideas and grow. From beginners learning about candlestick wicks and market structure to traders with years of experience, everyone is welcome.</p>
<p>The platform combines learning courses with a Twitter-style social feed where members can ask questions, share their trades and learn from one another in a supportive, fun community.</p>
@else
<p>A short introduction to the project will go here: what I made, who it is for and what it does.</p>
@endif<h3>My contribution</h3>
@if($number === 1)
<p>I am the owner of TradeSphere and built the website, bringing my idea for a welcoming trading community and learning platform to life.</p>
<details class="project-tech-details">
<summary>Tools & technologies</summary>
<ul class="project-tech-list">
<li><strong>Languages:</strong> HTML, CSS, JavaScript, PHP and SQL.</li>
<li><strong>Framework & templates:</strong> Laravel 10 and Blade.</li>
<li><strong>Backend services:</strong> Supabase Auth, PostgreSQL database, Row Level Security policies and Supabase Storage for uploaded images.</li>
<li><strong>Build & dependencies:</strong> Vite, npm and Composer.</li>
<li><strong>Libraries:</strong> Supabase JavaScript client, Axios and libphonenumber-js for phone-number validation.</li>
<li><strong>Learning integration:</strong> Mindsmith courses, SCORM 1.2, embedded course players and progress tracking.</li>
</ul>
</details>
@else
<p>Details about my role, the features I built and what I learned will be added here.</p><h3>Tools & technologies</h3><p>The languages, frameworks and tools used for this project will be listed here.</p>
@endif<span class="detail-status">Demo and source code links coming soon</span></div>
</article>
@endforeach
</div>
@break
@case('skills')
@include('partials.skills', ['skillPrefix' => 'detail'])
@break
@case('experience')
<div class="cv-history">
<section aria-labelledby="work-history"><span class="eyebrow">01 / ON THE JOB</span><h2 id="work-history">WORK EXPERIENCE.</h2>
<article class="cv-entry"><div class="cv-entry-heading"><h3>Server</h3><span>2026 - Present</span></div><p class="cv-place">Soju Bar · Amsterdam de Pijp</p><p>Taking customer orders, serving food and keeping tables, chairs and the dining area clean.</p></article>
<article class="cv-entry"><div class="cv-entry-heading"><h3>Aankomend Verkoopmedewerker</h3><span>2023 - 2024</span></div><p class="cv-place">Etos · Amsterdam-Noord</p><p>Operating the register, restocking shelves and keeping displays tidy. Advising customers on makeup, shower products and other personal care items.</p></article>
<article class="cv-entry"><div class="cv-entry-heading"><h3>Vulploegmedewerker</h3><span>2022 - 2023</span></div><p class="cv-place">Dirk van den Broek · Oostzaan</p><p>Restocking shelves throughout the store, placing older products at the front and keeping products neatly arranged.</p></article>
</section>
<section aria-labelledby="education-history"><span class="eyebrow">02 / LEARNING & DEVELOPMENT</span><h2 id="education-history">EDUCATION.</h2>
<article class="cv-entry"><div class="cv-entry-heading"><h3>MBO 4 Software Development</h3><span>2025 - Present</span></div><p class="cv-place">ROCvA Zuid-Oost</p></article>
<article class="cv-entry"><div class="cv-entry-heading"><h3>MBO 4 Software Development</h3><span>2024 - 2025</span></div><p class="cv-place">BIT-Academy</p></article>
<article class="cv-entry"><div class="cv-entry-heading"><h3>MAVO</h3><span>2020 - 2024</span></div><p class="cv-place">Bredero Mavo</p></article>
</section>
</div>
@break
@case('contact')
<div class="detail-grid contact-details"><div><h2>LET’S MAKE<br>AN IMPRESSION.</h2><p>Have a question, an opportunity or an idea to share? Get in touch.</p><p>To make getting in touch easier, <a id="contact-form-trigger" class="contact-form-link" href="#contact-form" aria-controls="contact-form" aria-expanded="{{ ($errors->any() || session('contact_success')) ? 'true' : 'false' }}">send me a message using the contact form <span aria-hidden="true">↘</span></a>.</p><p class="contact-name">Chloe Waldron<br><span>Student software developer · Amsterdam</span></p></div>
<dl class="contact-list">
<div><dt>Email</dt><dd><a href="mailto:{{ config('contact.email') }}">{{ config('contact.email') }} <span aria-hidden="true">↗</span></a></dd></div>
<div><dt>Phone</dt><dd><a href="tel:+31645278800">06 45278800 <span aria-hidden="true">↗</span></a></dd></div>
<div><dt>Location</dt><dd>Amsterdam, Netherlands</dd></div>
<div><dt>LinkedIn</dt><dd><a href="https://www.linkedin.com/in/chloewaldron140708/" target="_blank" rel="noopener noreferrer">linkedin.com/in/chloewaldron140708 <span aria-hidden="true">↗</span><span class="sr-only"> (opens in a new tab)</span></a></dd></div>
<div><dt>GitHub</dt><dd><a href="https://github.com/qh1xe" target="_blank" rel="noopener noreferrer">github.com/qh1xe <span aria-hidden="true">↗</span><span class="sr-only"> (opens in a new tab)</span></a></dd></div>
</dl></div>
<section id="contact-form" class="contact-form-section" aria-labelledby="contact-form-title" @if(!$errors->any() && !session('contact_success')) hidden @endif>
<div class="contact-form-heading"><span class="eyebrow">A MESSAGE AWAY</span><button id="contact-form-close" class="contact-form-close" type="button" aria-controls="contact-form">Close form <span aria-hidden="true">×</span></button></div>
<h2 id="contact-form-title" tabindex="-1">LET’S TALK.</h2>
<p>Tell me a little about your question or idea. I’ll reply to the email address you leave below.</p>
@if(session('contact_success'))
<p class="form-notice" role="status">{{ session('contact_success') }}</p>
@endif
@if($errors->any())
<div class="form-notice form-notice-error" role="alert"><p>Please check your message:</p><ul>
@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
</ul><a class="contact-form-link" href="mailto:{{ config('contact.email') }}">Email {{ config('contact.email') }} directly</a></div>
@endif
<form class="contact-form" action="{{ route('contact.send') }}#contact-form" method="POST">
@csrf
<div class="contact-form-row">
<div><label for="contact-name">Your name</label><input id="contact-name" name="name" type="text" autocomplete="name" maxlength="100" required value="{{ old('name') }}" @error('name') aria-invalid="true" @enderror></div>
<div><label for="contact-email">Your email</label><input id="contact-email" name="email" type="email" autocomplete="email" maxlength="254" required value="{{ old('email') }}" @error('email') aria-invalid="true" @enderror></div>
</div>
<label for="contact-topic">What would you like to talk about?</label>
<select id="contact-topic" name="topic" required aria-controls="contact-other-topic" @error('topic') aria-invalid="true" @enderror>
<option value="" disabled @selected(!old('topic'))>Choose a topic</option>
@foreach(config('contact.topics') as $value => $label)
<option value="{{ $value }}" @selected(old('topic') === $value)>{{ $label }}</option>
@endforeach
</select>
<div id="contact-other-topic">
<label for="contact-custom-topic">Which topic would you like to discuss?</label>
<textarea id="contact-custom-topic" name="other_topic" rows="3" maxlength="300" placeholder="Tell me the topic you have in mind…" @error('other_topic') aria-invalid="true" @enderror>{{ old('other_topic') }}</textarea>
</div>
<noscript><p>Selecting “Other”? Please describe your topic in the field above.</p></noscript>
<label for="contact-message">Your message</label><textarea id="contact-message" name="message" rows="7" maxlength="5000" required @error('message') aria-invalid="true" @enderror>{{ old('message') }}</textarea>
<div class="contact-form-trap" aria-hidden="true"><label for="contact-website">Leave this field empty</label><input id="contact-website" name="website" type="text" tabindex="-1" autocomplete="off"></div>
<p class="contact-form-note">All fields are required. Your details will only be used to respond to your message.</p>
<button type="submit">Send message <span aria-hidden="true">↗</span></button>
</form>
<script>
(() => {
    const section = document.getElementById('contact-form');
    const trigger = document.getElementById('contact-form-trigger');
    document.getElementById('contact-form-close').addEventListener('click', () => {
        section.hidden = true;
        trigger.setAttribute('aria-expanded', 'false');
        if (window.location.hash === '#contact-form') {
            history.replaceState(null, '', window.location.pathname + window.location.search);
        }
        trigger.focus();
    });
    const revealForm = (moveFocus = false) => {
        section.hidden = false;
        trigger.setAttribute('aria-expanded', 'true');
        if (moveFocus) {
            document.getElementById('contact-form-title').focus({ preventScroll: true });
            section.scrollIntoView({ behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth' });
        }
    };
    trigger.addEventListener('click', () => revealForm(true));
    const revealFromHash = () => {
        if (window.location.hash === '#contact-form') revealForm();
    };
    window.addEventListener('hashchange', revealFromHash);
    revealFromHash();
    const topic = document.getElementById('contact-topic');
    const customTopic = document.getElementById('contact-other-topic');
    const input = document.getElementById('contact-custom-topic');
    const updateTopic = () => {
        const isOther = topic.value === 'other';
        customTopic.hidden = !isOther;
        input.disabled = !isOther;
        input.required = isOther;
    };
    topic.addEventListener('change', updateTopic);
    window.addEventListener('pageshow', updateTopic);
    updateTopic();
})();
</script>
</section>
@break
@endswitch
</div>
@endsection
