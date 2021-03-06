<?php

namespace JM\Viewable\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];
    protected $dates = ['viewed_at'];

    public function user()
    {
        return $this->belongsTo(
            config('viewable.user_model')
        );
    }

    public function viewable()
    {
        return $this->morphTo();
    }
}
