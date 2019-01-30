<?php

namespace App\Forms\Contact;

use Belt, Mail;
use App\Forms\Contact\AutoResponder;
use Belt\Core\Events\ItemCreated;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class AutoResponderListener
 * @package App\Forms\Contact
 */
class AutoResponderListener implements ShouldQueue
{
    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 5;

    /**
     * Handle the event.
     *
     * @param  UserCreated $event
     * @return void
     */
    public function handle(ItemCreated $event)
    {
        $form = $event->item();

        $recipient = $form->data['email'];

        $mailable = new AutoResponder($form);

        Mail::to($recipient)->send($mailable);
    }

}