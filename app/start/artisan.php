<?php

/*
|--------------------------------------------------------------------------
| Register The Artisan Commands
|--------------------------------------------------------------------------
|
| Each available Artisan command must be registered with the console so
| that it is available to be called. We'll register every command so
| the console gets access to each of the command object instances.
|
*/

App::bind('Brigham\Podcast\Services\PodcastServiceInterface', 'Brigham\Podcast\Services\PodcastService');
Artisan::resolve('UpdatePodcastsCommand');


App::bind('PodcastCron', function()
{
    //return new \Brigham\Podcast\Cron\PodcastCron;
});
