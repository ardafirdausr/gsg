<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\EventController;
use Illuminate\Http\Request;

class StoreEventTest extends TestCase
{

    /** @test */
    public function it_store_event()
    {
        $eventController  = new EventController();
        $request = new Request;
        $response = $eventController->storeEvent($request);
        $response->assertRedirect('login');
    }
}
