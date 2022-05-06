<?php

namespace App\Service;

use Twilio\Rest\Client;

class WhatsAppService {

    private Client $twilio;

    public function __construct(
        private string $twilioWhatsAppNumber,
        string         $twilioAccountSID,
        string         $twilioAuthToken,
    ) {

        $this->twilio = new Client($twilioAccountSID, $twilioAuthToken);
    }

    public function send(string $message, string $to)
    : void {

        $this->twilio->messages->create($to, [
            'from' => "whatsapp:{$this->twilioWhatsAppNumber}",
            'body' => $message,
        ]);
    }
}