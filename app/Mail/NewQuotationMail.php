<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewQuotationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // Variabel untuk menampung data quotation

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Permohonan Quotation Baru - ' . $this->data->nama_perusahaan)
                    ->view('emails.new_quotation'); // Mengarah ke file blade email
    }
}