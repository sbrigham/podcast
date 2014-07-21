<?php namespace Brigham\Podcast\Repositories;

use Episode;
use Show;

class EloquentPodcastRepository implements PodcastRepositoryInterface {

    /**
     *
     * Creates a new "podcast" (adds to db). All of the data
     * associated with the rss feed for a given podcast
     *
     * @param array $podcast
     */
    public function create(array $show, array $episodes)
    {
        $show = Show::create($show);

        foreach($episodes as $episode) {
            $episode = Episode::create($episode);
            $show->episodes()->save($episode);
        }
    }

    public function getLatestEpisode($show_id)
    {
        return Episode::where('show_id', $show_id)->orderBy('published_at', 'DESC')->firstOrFail()->toArray();
    }

    public function getShow($show_id, $with_episodes = true)
    {
        if(! $with_episodes) {
            return Show::where('id', $show_id)->firstOrFail();
        }
        return Show::where('id', $show_id)->firstOrFail();
    }

    public function getEpisodes($show_id)
    {
        return Episode::where('show_id', $show_id)->sortBy('published_at')->toArray();
    }

    public function getEpisode($id)
    {
        return Episode::find($id);
    }

    /**
     *
     * Gets the shows as a paginated collection
     *
     * @param int $per_page
     * @return mixed
     */
    public function getShows($per_page = 15)
    {
        return Show::paginate($per_page);
    }

    public function saveEpisode($episode)
    {
        return Episode::create($episode);
    }
}