<?php
/**
 * Created by PhpStorm.
 * User: spencerbrigham
 * Date: 6/10/14
 * Time: 10:40 PM
 */

namespace Brigham\Podcast\Builders;

interface PodcastBuilderInterface {
    public function __construct($feed_url);
    public function build();
    public function getShow();
    public function getEpisodes();
}