<?php

namespace Gpanos\ObserveAttribute;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class Observe
{
    public function __construct(public object|array|string $observer)
    {
    }
}
