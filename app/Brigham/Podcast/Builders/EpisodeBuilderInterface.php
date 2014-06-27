<?php

namespace Brigham\Podcast\Builders;


use Brigham\Podcast\Adapters\EpisodeAdapterInterface;

interface EpisodeBuilderInterface {
    public function __construct(EpisodeAdapterInterface $episode_adapter);
    public function build();
    public function getEpisode();
} 