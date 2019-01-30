<?php

namespace App\Forms\Contact;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Belt\Core\Form;

/**
 * Class Notification
 * @package App\Forms\Contact
 */
class Notification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Form
     */
    public $form;

    /**
     * Create a new message instance.
     *
     * @param Form $form
     * @return void
     */
    public function __construct(Form $form)
    {
        $this->form = $form;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Contact From: ' . env('APP_URL'))
            ->view('mail.forms.contact.notification')
            ->text('mail.forms.contact.notification-plain')
            ->with([
                'name' => $this->form->data('name'),
                'email' => $this->form->data('email'),
                'comments' => $this->form->data('comments'),
            ]);
    }
}
