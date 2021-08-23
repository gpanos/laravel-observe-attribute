<?php

namespace Gpanos\ObserveAttribute\Tests;

use Gpanos\ObserveAttribute\Tests\Stubs\EloquentTestObserverStub;
use Gpanos\ObserveAttribute\Tests\Stubs\Models\EloquentModelStub;
use Illuminate\Contracts\Events\Dispatcher;
use Mockery as m;

class ObserverTest extends TestCase
{
    public function test_it_registers_the_observers()
    {
        EloquentModelStub::setEventDispatcher($events = m::mock(Dispatcher::class));

        $events->shouldReceive('listen')->once()->with('eloquent.creating: ' . EloquentModelStub::class, EloquentTestObserverStub::class . '@creating');
        $events->shouldReceive('listen')->once()->with('eloquent.saved: ' . EloquentModelStub::class, EloquentTestObserverStub::class . '@saved');
        $events->shouldReceive('forget');
        $events->shouldReceive('dispatch');

        $this
            ->observerRegistrar
            ->registerDirectory($this->getTestPath('Stubs/Models'));

        EloquentModelStub::flushEventListeners();
    }
}
