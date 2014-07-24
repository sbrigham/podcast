<?php


class RoutesTest extends TestCase {
    public function test_home_route()
    {
        $this->call('GET', '/');

        $this->assertResponseOk();
    }

    public function test_show_all_route()
    {
        $this->call('GET', '/shows');
        $this->assertResponseOk();
    }

    public function test_show_episodes_route()
    {
        Route::enableFilters();
        $this->call('GET', '/1');
        $this->assertResponseOk();
    }

    public function test_episode_about_route()
    {
        $this->call('GET', '/1/episode/1');
    }
}
 