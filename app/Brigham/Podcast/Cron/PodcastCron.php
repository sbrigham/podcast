<?php

namespace Brigham\Podcast\Cron;

use Brigham\Podcast\Services\PodcastServiceInterface;

class PodcastCron {
    private $pod_service;
    public function __construct(PodcastServiceInterface $pod_service)
    {
        $this->pod_service = $pod_service;
    }

    public function updateAll()
    {
        $this->pod_service->updatePodcasts();
        dd('cron was executed');
    }
}