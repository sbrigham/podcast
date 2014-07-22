<?php

use Brigham\Podcast\Services\PodcastServiceInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EpisodeController extends \BaseController {

    private $pod_service;

    public function __construct(PodcastServiceInterface $pod_service)
    {
        $this->pod_service = $pod_service;
    }

	/**
	 * Display a listing of a shows episodes.
	 *
	 * @return Response
	 */
	public function index($show_id)
	{
        $show = $this->pod_service->getShow($show_id);

		return View::make('episode.index', compact('show'));
	}

	/**
	 * Details view of an episode
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($show_id, $episode_id)
	{
        $episode = $this->pod_service->getEpisode($show_id, $episode_id);

        return View::make('episode.show', compact('episode'));
	}
}