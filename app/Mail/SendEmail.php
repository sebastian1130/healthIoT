<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable
{

    use Queueable, SerializesModels;

    /**
     * The demo object instance.
     *
     * @var Demo
     */
    public $demo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($demo)
    {
        $this->demo = $demo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('healthiotalarm@gmail.com')
                    ->view('mails.demo')
                    ->text('mails.demo_plain')
                    ->with(
                      [
                            'testVarOne' => 'Aquí iría la presión arterial',
                            'testVarTwo' => 'O aquí',
                      ]);
                      // ->attach(public_path('/images').'/demo.jpg', [
                      //         'as' => 'demo.jpg',
                      //         'mime' => 'image/jpeg',
                      // ]);
    }
}
