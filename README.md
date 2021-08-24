# PHP 8 attribute to register Laravel model observers. 

[![tests](https://github.com/gpanos/laravel-observe-attribute/actions/workflows/tests.yml/badge.svg)](https://github.com/gpanos/laravel-observe-attribute/actions/workflows/tests.yml)
[![code style](https://github.com/gpanos/laravel-observe-attribute/actions/workflows/code-style.yml/badge.svg)](https://github.com/gpanos/laravel-observe-attribute/actions/workflows/code-style.yml)

Instead of defining [observers](https://laravel.com/docs/8.x/eloquent#observers) inside service providers this package offers an alternative way to register model observers for your Laravel applications.

Inspired by [spatie/laravel-route-attributes](https://github.com/spatie/laravel-route-attributes)

## Installation 

```bash
composer require gpanos/laravel-observe-attribute
```

## Usage 

To register an observer add the `Observe` attribute to your model and pass it your observer class.

```php 
<?php

#[Observe(UserObserver::class)]
class User extends Authenticatable
{
    ...
}
```



