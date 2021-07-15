<?php

namespace JM\Viewable;

use hisorange\BrowserDetect\Parser as Browser;
use JM\Viewable\Models\View;

trait InteractsWithViews
{
    public string $viewable_id = 'id';

    /**
     * Count a view for the model
     */
    public function viewed()
    {
        if(Browser::isBot() == true && config('viewable.skip_bot_views') == true) {
            return;
        }

        $ip = request()->ip();
        $className = $this->getClassName();
        $id = $this->{$this->viewable_id};

        cache()->remember("viewed.{$className}.{$ip}.{$id}", now()->addMinutes(5), function () use ($ip, $className, $id) {

            View::create([
                'ip' => config('viewable.log_ips') == true ? $ip : null,
                'user_id' => config('viewable.log_users') == true ? optional(auth())->id() : null,
                'viewable_id' => $id,
                'viewable_type' => $className,
            ]);

            return true;

        });
    }

    public function getClassName(): string
    {
        return static::class;
    }

    public function views()
    {
         return $this->morphMany(View::class, 'viewable');
    }
}
