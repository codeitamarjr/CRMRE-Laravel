<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\EmailTemplates;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TemplatesEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EmailTemplates $email_templates)
    {
        /* Set the email template object */
        $this->email_templates = $email_templates;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        /* Build the email with the template object */
        return $this->view('mails.templates', [
            'email_templates' => $this->email_templates
        ]);
    }
}
