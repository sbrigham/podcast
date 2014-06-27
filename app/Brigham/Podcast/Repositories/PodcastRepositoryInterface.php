<?php namespace Brigham\Podcast\Repositories;


Interface PodcastRepositoryInterface {
    public function create(array $show, array $episodes);
    public function getShows();
    public function getEpisodes($show_id);
    public function getLatestEpisode($show_id);
    public function saveEpisode($episode);
} 