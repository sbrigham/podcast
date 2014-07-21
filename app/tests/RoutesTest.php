<?php

use Brigham\Podcast\Repositories\EloquentPodcastRepository;
use Brigham\Podcast\Services\PodcastUpdater;

class RoutesTest extends TestCase {
    public function test_home_route()
    {
        $this->call('GET', '/');

        $this->assertResponseOk();
    }

    public function test_show_routes()
    {

    }
}
 