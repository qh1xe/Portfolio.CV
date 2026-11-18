<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_portfolio_pages_load_with_browser_security_headers(): void
    {
        foreach (['/', '/about', '/portfolio', '/skills', '/experience', '/photography', '/photography/football', '/photography/portraits', '/contact'] as $path) {
            $response = $this->get($path)
                ->assertOk()
                ->assertHeader('X-Content-Type-Options', 'nosniff')
                ->assertHeader('X-Frame-Options', 'DENY');

            $policy = explode('; ', $response->headers->get('Content-Security-Policy'));
            $this->assertContains("script-src 'self'", $policy);
            $this->assertContains("frame-ancestors 'none'", $policy);
            $this->assertContains("form-action 'self'", $policy);
        }

        $this->get('/contact')->assertSee('js/contact.js', false)->assertDontSee('<script>', false);
    }
}
