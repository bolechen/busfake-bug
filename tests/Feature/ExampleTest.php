<?php

namespace Tests\Feature;

use App\Jobs\NeedFakeJob;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Bus;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testBusFake()
    {
        Bus::fake([NeedFakeJob::class]);
        $this->artisan('test:fake');
    }
}
