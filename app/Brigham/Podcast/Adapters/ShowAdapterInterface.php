<?php namespace Brigham\Podcast\Adapters;

interface ShowAdapterInterface {
    public function __construct($provider);
    public function getCategories();
    public function getFeedUrl();
    public function getName();
    public function getDescription();
    public function getImageSrc();
    public function getLastBuildDate();
    public function getEpisodes();
}