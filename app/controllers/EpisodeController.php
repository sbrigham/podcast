<?php

use Brigham\Podcast\Repositories\EloquentPodcastRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        try {

            $show = $this->repo->getShow($show_id);

        } catch(ModelNotFoundException $e) {

            App::abort(404);

        }

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
        try {
            $episode = $this->repo->getEpisode($episode_id);

            if($show_id != $episode->show_id) {
                App::abort(404);
            }
        } catch(ModelNotFoundException $e) {
            App::abort(404);
        }

        return View::make('episode.show', compact('episode'));
	}
}