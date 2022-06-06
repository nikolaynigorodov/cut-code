<?php

namespace App\Listeners;

use App\Events\CommentCreate;
use App\Mail\NewCommentEmail;
use Illuminate\Support\Facades\Mail;

class NewCommentEmailNotification
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(CommentCreate $event)
    {
        Mail::to('nikolaynigorodov@gmail.com')->send(new NewCommentEmail($event));
    }
}
