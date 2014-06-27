<?php namespace Brigham\Podcast\Adapters;


interface EpisodeAdapterInterface {
    public function __construct($item);
    public function getSrc();
    public function getName();
    public function getDescription();
    public function getImageSrc();
    public function getPublishedAt();
}