<?php namespace Brigham\Podcast\Repositories;

use Show;
use Episode;
class ShowRepository {
    public function getShow($show_id,$with_episodes = true)
    {
        if(! $with_episodes) {
            return Show::where('id', $show_id)->with('categories')->firstOrFail();
        }
        return Show::where('id', $show_id)->with('categories')->firstOrFail();
    }
}