<?php

namespace App\Mail;

use App\Events\CommentCreate;
use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewCommentEmail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var CommentCreate
     */
    public $commentCreate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(CommentCreate $commentCreate)
    {
        $this->commentCreate = $commentCreate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.new_comment_email')->with([
            'text' => $this->commentCreate->comment->text
        ]);
    }
}
