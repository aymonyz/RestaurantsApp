<?php
namespace App\Http\Controllers;

use App\Services\TwilioService;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    protected $twilioService;

    public function __construct(TwilioService $twilioService)
    {
        $this->twilioService = $twilioService;
    }

    public function send(Request $request)
    {
        $recipient = $request->input('to');
        $message = $request->input('message');
        $method = $request->input('method');
    
        if ($method === 'sms') {
            $this->twilioService->sendSMS($recipient, $message);
        } elseif ($method === 'whatsapp') {
            $this->twilioService->sendWhatsApp($recipient, $message);
        } elseif ($method === 'both') {
            $this->twilioService->sendSMS($recipient, $message);
            $this->twilioService->sendWhatsApp($recipient, $message);
        }
    
        return redirect()->back()->with(['message' => 'تم إرسال الرسالة']);
    }
}