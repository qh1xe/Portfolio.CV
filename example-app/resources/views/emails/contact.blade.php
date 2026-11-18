New message from your portfolio contact form

Name: {{ $details['name'] }}
Email: {{ $details['email'] }}
Topic: {{ config('contact.topics')[$details['topic']] }}
@if($details['topic'] === 'other')
Custom topic: {{ $details['other_topic'] }}
@endif

{{ $details['message'] }}
