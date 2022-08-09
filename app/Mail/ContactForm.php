<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;
    
    private $data;
    

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('homes.contactmail')
                    ->with(['data' => $this->data])
                    ->subject('お問合せを受け付けました');
    }
    /**
     * お問合せフォームのメール送信
     * (HomeControllerのcontact_send)
     */
    public static function contactSend($request)
    {
        $data = $request->all();
         
        Mail::to(env('MAIL_ADMIN'))->send(new ContactForm($data));
        Mail::to($data['email'])->send(new ContactForm($data));
    }
}
