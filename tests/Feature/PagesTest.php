<?php

namespace Tests\Features;

use Illuminate\Foundation\Testing\TestCase;
use Tests\CreatesApplication;

class PagesTest extends TestCase
{
    use CreatesApplication;

    public function test_it_displays_the_home_page()
    {
        $this->get('/')->assertStatus(200);
    }

    public function test_it_displays_the_about_page()
    {
        $this->get('/about')->assertStatus(200);
    }

    public function test_it_displays_a_post_page()
    {
        $this->get('/adventure-time-with-webpack')->assertStatus(200);
    }

    public function test_it_redirects_old_post_pages()
    {
        $this->get('/posts/2016/adventure-time-with-webpack')->assertStatus(302);
    }

    public function test_it_displays_the_main_feed()
    {
        $this->get('/feed')->assertStatus(200);
    }

    public function test_it_displays_the_articles_feed()
    {
        $this->get('/articles.xml')->assertStatus(200);
    }
}
