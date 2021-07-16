# Laravel Viewable

[![Latest Stable Version](http://poser.pugx.org/jm-inc/laravel-viewable/v)](https://packagist.org/packages/jm-inc/laravel-viewable)
[![GitHub license](https://img.shields.io/github/license/JM-Inc/laravel-viewable)](https://github.com/JM-Inc/laravel-viewable/blob/main/LICENSE.md)
![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/jm-inc/laravel-viewable/run-tests?label=tests)
![Total Downloads](https://img.shields.io/packagist/dt/jm-inc/laravel-viewable)

A simple Laravel 8 package to count views for models.

## Installation
```bash
composer require jm-inc/laravel-viewable
php artisan migrate
php artisan vendor:publish --tag=viewable-config # publish the configuration (optional)
```

## Setup
1. Add this trait `JM\Viewable\InteractsWithViews` to the model you want to count views for.
2. In your `show` controller method, use `$model->viewed()` to count a view.
3. If the primary key of your model is not `id` set `$viewable_id = 'primary-key` in your model. 

## Example
Your model should look like this:
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use JM\Viewable\InteractsWithViews;

class Post extends Model
{
    use HasFactory, InteractsWithViews;
}
```
Your `show` route method should look like this:
```php
<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function show(Post $post)
    {
        // ...
        $post->viewed();
        // ...
    }
}
```