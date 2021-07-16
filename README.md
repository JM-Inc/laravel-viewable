# Laravel Viewable
A simple Laravel package to count views for models.

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