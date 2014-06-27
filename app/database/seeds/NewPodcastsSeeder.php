<?php
use Brigham\Podcast\Repositories\EloquentPodcastRepository;
use Brigham\Podcast\Services\PodcastService;

/**
 * Created by PhpStorm.
 * User: spencerbrigham
 * Date: 6/2/14
 * Time: 11:08 PM
 */

class NewPodcastsSeeder extends Seeder {
    public function run()
    {
        // Currently does not check if any feeds already exist.. update later

        $podcast_feeds = [
            'http://joeroganexp.joerogan.libsynpro.com/rss',
            'http://theadamcarollashow.libsyn.com/rss',
            'http://lavenderhour.libsyn.com/rss',
            'http://nerdist.libsyn.com/rss',
            'http://feeds.feedburner.com/laraveliopodcast'
        ];

        $repo = new EloquentPodcastRepository();
        foreach ($podcast_feeds as $url) {
            $podcast_service = new PodcastService($repo);
            $podcast_service->make($url);
        }
    }
} 