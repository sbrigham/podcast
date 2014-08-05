<?php namespace Brigham\Podcast\Repositories;

use Category;
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
        $categories = $show['categories'];
        unset($show['categories']);
        $show = Show::create($show);

        foreach($categories as $category) {
            $cat = Category::firstOrCreate(['name' => $category]);
            $show->categories()->attach($cat);
        }

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
        return Episode::where('id', $id)->firstOrFail();
    }

    /**
     *
     * Gets the shows as a paginated collection
     *
     * @param int $per_page
     * @return mixed
     */
    public function getShows()
    {
        return $shows = Show::with('categories')->remember('60')->get()->toJson();
    }

    public function saveEpisode($episode)
    {
        return Episode::create($episode);
    }
}