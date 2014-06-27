<?php
/**
 * Created by PhpStorm.
 * User: spencerbrigham
 * Date: 5/28/14
 * Time: 9:23 PM
 */

namespace Brigham\Podcast\Services;


interface PodcastServiceInterface {
    public function make($feed_url);
    public function updatePodcasts();
} 