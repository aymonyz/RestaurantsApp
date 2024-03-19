<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\TwilioService;

class SmsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_send_sms()
{
    // Mock the TwilioService
    $twilioServiceMock = $this->createMock(TwilioService::class);

    // Expect the sendSMS method to be called once
    // and return true or any other expected result
    $twilioServiceMock->expects($this->once())
                      ->method('sendSMS')
                      ->willReturn(true);

    // Bind your mock to the service container
    $this->app->instance(TwilioService::class, $twilioServiceMock);

    // Simulate a POST request to your controller
    $response = $this->json('POST', '/your-sms-send-route', [
        'to' => '+966567808170',
        'message' => 'إصدار فاتورة من موقع المغسلة'
    ]);

    // Assert the response status is 200 OK or any other expected status
    $response->assertStatus(200);

    // Assert the JSON response structure
    $response->assertJson(['message' => 'SMS sent successfully!']);
}

}
