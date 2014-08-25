<?php namespace Brigham\Podcast\Builders\Providers\SimplePie;

use Brigham\Podcast\Adapters\EpisodeAdapterInterface;
use Brigham\Podcast\Builders\EpisodeBuilderInterface;

class EpisodeBuilder implements EpisodeBuilderInterface {

    protected $episode;
    protected $episode_adapter;

    public function __construct(EpisodeAdapterInterface $episode_adapter)
    {
        $this->episode_adapter = $episode_adapter;
    }

    public function build()
    {
        $this->episode = [
            'name' => $this->episode_adapter->getName(),
            'description' => $this->episode_adapter->getDescription(),
            'image_src' => $this->episode_adapter->getImageSrc(),
            'src' => $this->episode_adapter->getSrc(),
            'published_at' => $this->episode_adapter->getPublishedAt(),
            'duration' => $this->episode_adapter->getDuration()
        ];
    }

    public function getEpisode()
    {
        return $this->episode;
    }
}