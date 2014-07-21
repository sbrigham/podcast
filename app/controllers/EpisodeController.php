<?php

use Brigham\Podcast\Repositories\EloquentPodcastRepository;

class EpisodeController extends \BaseController {

    private $repo;

    public function __construct(EloquentPodcastRepository $repo)
    {
        $this->repo = $repo;
    }

	/**
	 * Display a listing of a shows episodes.
	 *
	 * @return Response
	 */
	public function index($show_id)
	{
        // For now just show a show and it's episodes...
        $show = $this->repo->getShow($show_id);

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
        $episode = $this->repo->getEpisode($episode_id);

        return View::make('episode.show', compact('episode'));
	}
}