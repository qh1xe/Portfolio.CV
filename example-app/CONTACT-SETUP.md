# Contact form email delivery

The contact page and form recipient both use `config/contact.php`:
`chloewaldron2008@gmail.com`. Visitor addresses are set as Reply-To; the
sender uses the site's authenticated mail account.

Before using the form on a live server, configure `.env` with your mail
provider's SMTP host, port, encryption, username, password and verified
`MAIL_FROM_ADDRESS`, and set `MAIL_MAILER=smtp`. Do not commit credentials.
The current `mailpit:1025` settings are for local testing and do not deliver
to Gmail. Run `php artisan config:clear` after changing configuration.

Verify delivery with a message submitted from the deployed contact page.
The form displays an error and preserves the message when sending fails.
CSRF protection, a honeypot field and a five-submissions-per-minute limit
are enabled.
