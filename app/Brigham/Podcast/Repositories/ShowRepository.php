<?php namespace Brigham\Podcast\Repositories;

use Show;
class ShowRepository {
    public function getShow($show_id, $with_episodes = true)
    {
        if(! $with_episodes) {
            return Show::where('id', $show_id)->firstOrFail();
        }
        return Show::where('id', $show_id)->firstOrFail();
    }
}