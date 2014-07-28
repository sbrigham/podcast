<?php
use Brigham\Podcast\Repositories\EloquentPodcastRepository;
use Brigham\Podcast\Services\PodcastService;

class NewPodcastsSeeder extends Seeder {
    public function run()
    {
        // TODO Currently does not check if any feeds already exist..

        $podcast_feeds = [
            'http://joeroganexp.joerogan.libsynpro.com/rss',
            'http://theadamcarollashow.libsyn.com/rss',
            'http://lavenderhour.libsyn.com/rss',
            'http://nerdist.libsyn.com/rss',
            'http://feeds.feedburner.com/laraveliopodcast',
            'http://feeds.feedburner.com/TheAdamAndDrewShow',
            'http://feeds.feedburner.com/AceOnTheHouse',
            'http://traffic.tfvpodcast.libsyn.com/rss',
            'http://opieandanthonypodcast.libsyn.com/rss',
            'http://feeds.soundcloud.com/users/soundcloud:users:38128127/sounds.rss',
            'http://www.podcastone.com/podcast?categoryID2=331',
            'http://deathsquad.libsyn.com/rss'
        ];

        $repo = new EloquentPodcastRepository();
        foreach ($podcast_feeds as $url) {
            $podcast_service = new PodcastService($repo);
            $podcast_service->make($url);
        }
    }
} 