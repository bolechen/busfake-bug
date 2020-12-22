<?php

namespace Tests\Feature;

use App\Jobs\NeedFakeJob;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Bus;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function testBusFake()
    {
        Bus::fake([NeedFakeJob::class]);

        // want NormalJob dispatch
        $this->artisan('test:busfake');

        $this->assertSame('value', cache('key'), 'NormalJob not dispatch!');
    }
}
