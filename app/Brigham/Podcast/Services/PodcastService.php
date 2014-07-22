<?php namespace Brigham\Podcast\Services;

use Brigham\Podcast\Builders\Providers\SimplePie\PodcastBuilder;
use Brigham\Podcast\Repositories\PodcastRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Mail;

class PodcastService implements PodcastServiceInterface {
    private $pod_repo;

    public function __construct(PodcastRepositoryInterface $pod_repo)
    {
        $this->pod_repo = $pod_repo;
    }

    /**
     *
     * Adds a single podcast to the database
     *
     * @param $feed_url
     * @return bool
     */
    public function make($feed_url)
    {
        $pod_builder = new PodcastBuilder($feed_url);
        $pod_builder->build();

        $this->pod_repo->create($pod_builder->getShow(), $pod_builder->getEpisodes());

        return true;
    }

    /**
     * Updates the new episodes for all of the shows
     */
    public function updatePodcasts()
    {
        $shows = $this->pod_repo->getShows();
        $pod_updater = new PodcastUpdater($this->pod_repo);

        foreach ($shows as $old_show) {
            $pod_builder = new PodcastBuilder($old_show['feed_url']);
            $pod_builder->build();

            $new_show = $pod_builder->getShow();

            if($pod_updater->shouldUpdate($new_show, $old_show)) {
                $pod_updater->updatePodcast($old_show['id'], $pod_builder->getEpisodes());
            }
        }

        // Update the stored last_build_date
    }

    public function getEpisode($show_id, $episode_id)
    {
        try {
            $episode = $this->pod_repo->getEpisode($episode_id);

            if($show_id != $episode->show_id) {
                App::abort(404);
            }
        } catch(ModelNotFoundException $e) {
            App::abort(404);
        }

        // Make sure source is valid

        try {

            fopen($episode['src'], 'r');

        } catch(\Exception $e) {

            Mail::send('emails.errors.d', ['message' => $e->getMessage()], function($message) {
                $message->from('me@spencerbrigham.com', 'Podcast Admin');
                $message->to('sdbrigha@buffalo.edu');
            });
        }

        return $episode;
    }

    public function getShow($show_id)
    {
        try {

             $show = $this->pod_repo->getShow($show_id);

        } catch(ModelNotFoundException $e) {

            App::abort(404);

        }

        return $show;
    }
}