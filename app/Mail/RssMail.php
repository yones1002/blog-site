<?php

namespace App\Mail;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RssMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Blog $blog,
        public User $user
    ) {}

    public function build(): self
    {
        return $this
            ->subject($this->blog->title)
            ->view('mail.rss')
            ->with([
                'user' => $this->user,
                'title' => $this->blog->title,
                'body' => $this->blog->short_detail,
            ]);
    }
}
