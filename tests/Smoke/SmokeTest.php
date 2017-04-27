<?php

namespace Tests\Smoke;

class SmokeTest extends TestCase
{
    public function test_it_displays_the_home_page()
    {
        $this->get('/')->assertStatus(200);
    }

    public function test_it_displays_the_about_page()
    {
        $this->get('/about')->assertStatus(200);
    }

    public function test_it_displays_the_open_source_page()
    {
        $this->get('/open-source')->assertStatus(200);
    }

    public function test_it_displays_a_post_page()
    {
        $this->get('/posts/2016/adventure-time-with-webpack')->assertStatus(200);
    }
}
