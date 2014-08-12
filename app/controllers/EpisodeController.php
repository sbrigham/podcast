<?php

use Brigham\Podcast\Repositories\ShowRepository;
use Brigham\Podcast\Services\EpisodeService;
use Brigham\Podcast\Services\PodcastServiceInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EpisodeController extends \BaseController {

    private $episode_service;
    private $show_repo;

    public function __construct(EpisodeService $episode_service, ShowRepository $show_repo)
    {
        $this->episode_service = $episode_service;
        $this->show_repo = $show_repo;
    }

    public function all() {
        return $this->episode_service->getAllEpisodes();
    }

	/**
	 * Display a listing of a shows episodes.
	 *
	 * @return Response
	 */
	public function index()
	{
        $show_id = Input::get('show');
        return $this->episode_service->getEpisodes($show_id);
	}

	/**
	 * Details view of an episode
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($episode_id)
	{
        $episode = $this->episode_service->getEpisode($episode_id);
        $episode['average_rating'] = $this->episode_service->getEpisodeAverageRating($episode_id);

        if (Auth::check()) {
            $episode['user_rating'] = $this->episode_service->getEpisodeRating($episode_id, Auth::user()->id);
        }

        $show = $episode->show()->getResults();
        return View::make('episode.show', compact('episode', 'show'));
	}
}