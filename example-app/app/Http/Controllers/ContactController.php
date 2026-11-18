<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Throwable;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'not_regex:/[\r\n]/'],
            'email' => ['required', 'email', 'max:254'],
            'topic' => ['required', Rule::in(array_keys(config('contact.topics')))],
            'other_topic' => ['exclude_unless:topic,other', 'required', 'string', 'max:300'],
            'message' => ['required', 'string', 'max:5000'],
            'website' => ['nullable', 'string', 'max:0'],
        ]);

        try {
            // Local logging/test transports must never report a delivered message.
            if (!in_array(config('mail.default'), ['smtp', 'sendmail', 'ses', 'postmark', 'mailgun'], true)) {
                throw new \RuntimeException('Contact form requires a delivery mailer.');
            }

            Mail::to(config('contact.email'))->send(new ContactMessage($data));
        } catch (Throwable $exception) {
            report($exception);

            return redirect()->to(route('contact').'#contact-form')
                ->withInput($request->only('name', 'email', 'topic', 'other_topic', 'message'))
                ->withErrors(['delivery' => 'Your message could not be sent right now. Please try again or email me directly.']);
        }

        return redirect()->to(route('contact').'#contact-form')
            ->with('contact_success', 'Thanks for getting in touch! Your message has been sent.');
    }
}
