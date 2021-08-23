<?php

namespace Gpanos\ObserveAttribute\Tests\Stubs\Models;

use Gpanos\ObserveAttribute\Observe;
use Gpanos\ObserveAttribute\Tests\Stubs\EloquentTestObserverStub;
use Illuminate\Database\Eloquent\Model;

#[Observe(EloquentTestObserverStub::class)]
class EloquentModelStub extends Model
{
}
