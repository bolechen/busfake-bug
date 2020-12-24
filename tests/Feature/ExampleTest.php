<?php

namespace Tests\Feature;

use App\Jobs\NeedFakeJob;
use App\Jobs\NormalJob;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function testBusFake()
    {
        Bus::fake([NeedFakeJob::class]);

        Bus::batch([
            new NeedFakeJob(),
            new NormalJob(),
        ])->dispatch();

        Bus::assertDispatched(NeedFakeJob::class);
        self::assertSame('value', Cache::get('key'), 'NormalJob not dispatch!');
    }
}
