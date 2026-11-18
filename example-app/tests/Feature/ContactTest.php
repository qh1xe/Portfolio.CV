<?php

namespace Tests\Feature;

use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactTest extends TestCase
{
    private function message(): array
    {
        return ['name' => 'Test Visitor', 'email' => 'visitor@example.com', 'topic' => 'projects', 'message' => 'Hello Chloe!'];
    }

    public function test_contact_page_links_to_the_form(): void
    {
        $this->get('/contact')->assertOk()->assertSee('href="#contact-form"', false)
            ->assertSee('mailto:'.config('contact.email'), false)->assertSee('name="_token"', false);
    }

    public function test_message_goes_to_displayed_email_with_visitor_as_reply_to(): void
    {
        config(['mail.default' => 'smtp']);
        Mail::fake();
        $this->post('/contact', $this->message())->assertRedirect(route('contact').'#contact-form')
            ->assertSessionHas('contact_success');
        Mail::assertSent(ContactMessage::class, function ($mail) {
            $mail->build();
            return $mail->hasTo(config('contact.email')) && $mail->hasReplyTo('visitor@example.com')
                && str_contains($mail->render(), 'Hello Chloe!')
                && str_contains(html_entity_decode($mail->render()), 'Projects & software development');
        });
    }

    public function test_invalid_input_is_rejected_without_sending_mail(): void
    {
        Mail::fake();
        $this->from('/contact')->post('/contact', ['name' => '', 'email' => 'invalid', 'message' => ''])
            ->assertSessionHasErrors(['name', 'email', 'message']);
        $this->post('/contact', array_merge($this->message(), ['website' => 'spam']))->assertSessionHasErrors('website');
        Mail::assertNothingSent();
    }

    public function test_delivery_failure_preserves_message_and_shows_error(): void
    {
        config(['mail.default' => 'smtp']);
        Mail::shouldReceive('to')->once()->andThrow(new \RuntimeException('SMTP unavailable'));
        $this->post('/contact', $this->message())->assertSessionHasErrors('delivery')
            ->assertSessionHasInput('message', 'Hello Chloe!')->assertSessionMissing('contact_success');
    }

    public function test_test_mailer_does_not_claim_delivery(): void
    {
        config(['mail.default' => 'log']);
        $this->post('/contact', $this->message())->assertSessionHasErrors('delivery')
            ->assertSessionMissing('contact_success');
    }

    public function test_other_topic_requires_a_description_and_unknown_topics_are_rejected(): void
    {
        Mail::fake();
        $this->post('/contact', array_merge($this->message(), ['topic' => 'other']))
            ->assertSessionHasErrors('other_topic');
        $this->post('/contact', array_merge($this->message(), ['topic' => 'unknown']))
            ->assertSessionHasErrors('topic');
        Mail::assertNothingSent();
    }

    public function test_custom_topic_is_included_in_the_email(): void
    {
        config(['mail.default' => 'smtp']);
        Mail::fake();
        $this->post('/contact', array_merge($this->message(), ['topic' => 'other', 'other_topic' => 'A LEGO project']))
            ->assertSessionHasNoErrors()->assertSessionHas('contact_success');
        Mail::assertSent(ContactMessage::class, fn ($mail) => str_contains($mail->render(), 'Custom topic: A LEGO project'));
    }
}
