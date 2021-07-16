<?php

namespace JM\Viewable\Tests\Feature;

use JM\Viewable\Models\View;
use JM\Viewable\Tests\Models\Post;
use JM\Viewable\Tests\TestCase;

class ViewsTest extends TestCase
{
    public function test_views_are_being_counted()
    {
        $this->assertCount(
            0,
            View::all(),
        );

        $post = Post::factory()->create();

        $post->viewed();

        $this->assertCount(
            1,
            View::all(),
        );

        $post = Post::factory()->create();

        $post->viewed();

        $this->assertCount(
            2,
            View::all(),
        );
    }

    public function test_views_are_not_being_counted_repeatedly()
    {
        $this->assertCount(
            0,
            View::all(),
        );

        $post = Post::factory()->create();

        $post->viewed();

        $this->assertCount(
            1,
            View::all(),
        );

        $post->viewed();

        $this->assertCount(
            1,
            View::all(),
        );
    }

    public function test_configuration_option_log_ips_is_being_respected()
    {
        $this->assertCount(
            0,
            View::all(),
        );

        $post = Post::factory()->create();

        $post->viewed();

        $this->assertNotNull(
            View::find(1)->ip
        );

        config(['viewable.log_ips' => false]);

        $post = Post::factory()->create();

        $post->viewed();

        $this->assertNull(
            View::find(2)->ip
        );
    }

    // TODO: Make tests for configuration options: log users, skip bots
}