<?php namespace Brigham\Podcast\Repositories;

use Episode;

class EpisodeRepository {

    public function getLatestEpisode($show_id)
    {
        return Episode::where('show_id', $show_id)->orderBy('published_at', 'DESC')->firstOrFail()->toArray();
    }

    public function getEpisode($id)
    {
        return Episode::where('id', $id)->firstOrFail();
    }

    public function saveEpisode($episode)
    {
        return Episode::create($episode);
    }

    public function getAll()
    {
        return Episode::all();
    }

    public function getEpisodes($show_id)
    {
        return Episode::where('show_id', $show_id)->get();
    }
}