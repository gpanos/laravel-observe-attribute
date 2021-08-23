# PHP 8 attribute to register Laravel model observers. 

Instead of defining [observers](https://laravel.com/docs/8.x/eloquent#observers) inside service providers this package offers an alternative way to register model observers for your Laravel applications.

## Installation 

Under development. For now make sure to configure the repository in your composer.json by running:

```bash
composer config repositories.laravel-observe-attribute vcs https://github.com/gpanos/laravel-observe-attribute
```

Then install the package by running:

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



