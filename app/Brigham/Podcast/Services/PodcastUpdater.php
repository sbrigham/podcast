<?php
/**
 * Created by PhpStorm.
 * User: spencerbrigham
 * Date: 6/18/14
 * Time: 10:31 PM
 */

namespace Brigham\Podcast\Services;

use DateTime;
use Brigham\Podcast\Repositories\PodcastRepositoryInterface;
use Illuminate\Support\Facades\Log;

class PodcastUpdater implements PodcastUpdaterInterface {

    protected $pod_repo;
    /**
     * @param PodcastRepositoryInterface $pod_repo
     */
    public function __construct(PodcastRepositoryInterface $pod_repo)
    {
        $this->pod_repo = $pod_repo;
        $test = 'what';
        $test = 'what';
    }

    /**
     *
     * Returns true if a podcast rss feed's last_build_date has changed
     *
     * @param $new_show
     * @param $old_show
     * @return bool
     */
    public function shouldUpdate($new_show, $old_show)
    {
        $old_lbd = DateTime::createFromFormat('Y-m-d H:i:s', $old_show['last_build_date']);
        $new_lbd = $new_show['last_build_date'];

        if(is_null($new_show['last_build_date']) || $new_lbd != $old_lbd) {
            return true;
        }

        return false;
    }

    /**
     * Adds all new episodes to a given podcast
     *
     * @param $show_id
     * @param array $episodes
     */
    public function updatePodcast($show_id, array $episodes)
    {
        $latest_episode = $this->pod_repo->getLatestEpisode($show_id);
        $latest_episode_pub_at = new DateTime();
        $latest_episode_pub_at->setTimestamp(strtotime($latest_episode['published_at']));

        $update_count = 0;
        foreach($episodes as $episode) {
            if($episode['published_at'] > $latest_episode_pub_at) {
                $episode['show_id'] = $show_id;
                $this->pod_repo->saveEpisode($episode);
                $update_count ++;
                Log::info("Show: {$show_id} added episode: {$episode['title']}");
            }
        }

        Log::info("Show: {$show_id} is up to date. Updated {$update_count} episodes");
    }
}