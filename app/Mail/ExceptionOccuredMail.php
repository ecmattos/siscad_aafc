<?php

namespace SisCad\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
 
class ExceptionOccuredMail extends Mailable
{
    use Queueable, SerializesModels;
 
    /**
     * The body of the message.
     *
     * @var string
     */
    private $content;
 
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content)
    {
        $this->content = $content;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.exception')
                    ->subject('SisCad - Notificação de ERRO encontrado :-(')
                    ->with('content', $this->content);
    }
}
