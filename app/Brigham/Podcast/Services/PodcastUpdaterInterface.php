<?php
/**
 * Created by PhpStorm.
 * User: spencerbrigham
 * Date: 6/18/14
 * Time: 10:32 PM
 */

namespace Brigham\Podcast\Services;

use Brigham\Podcast\Repositories\PodcastRepositoryInterface;

interface PodcastUpdaterInterface {
    public function __construct(PodcastRepositoryInterface $pod_repo);
    public function shouldUpdate($new_show, $old_show);
    public function updatePodcast($show_id, array $episodes);
} 
