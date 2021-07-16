<?php

namespace JM\Viewable\Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use JM\Viewable\InteractsWithViews;
use JM\Viewable\Tests\Factories\PostFactory;

class Post extends Model
{
    use HasFactory, InteractsWithViews;

    protected static function newFactory()
    {
        return PostFactory::new();
    }
}