<?php namespace Brigham\Podcast\Builders\Providers\SimplePie;

use Brigham\Podcast\Builders\PodcastBuilderInterface;
use Brigham\Podcast\Adapters\Providers\SimplePie\ShowAdapter;
use SimplePie;

/**
 * This class supports array format only
 */
class PodcastBuilder implements PodcastBuilderInterface {

    protected $podcast = []; // An array as a show with 'episodes' => [ ]
    protected $show;
    protected $episodes;
    protected $provider; // RssFeed manipulator
    protected $show_builder;

    public function __construct($feed_url)
    {
        $this->feed_url = $feed_url;
        $this->provider = new SimplePie();
        $this->provider->set_feed_url($feed_url);
        $this->provider->set_cache_location(storage_path().'/cache');
        $this->provider->init();
    }

    public function build()
    {
        $show_builder = new ShowBuilder(new ShowAdapter($this->provider));
        $show_builder->build();

        $this->show     = $show_builder->getShow();
        $this->episodes = $show_builder->getEpisodes();
    }

    public function getShow()
    {
        return $this->show;
    }

    public function getEpisodes()
    {
        return $this->episodes;
    }

    public function getMostRecentEpisodePublishedAt()
    {
        return $this->provider->get_item(0)->get_date();
    }
}