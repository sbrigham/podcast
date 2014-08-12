<?php

use Brigham\Podcast\Repositories\EloquentPodcastRepository;

class ShowController extends \BaseController {

    private $repo;
    public function __construct(EloquentPodcastRepository $repo)
    {
        $this->repo = $repo;
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('show.index', compact('shows'));
	}

    public function all()
    {
        return $this->repo->getShows();
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $show = $this->repo->getShow($id);

		return View::make('show.show', compact('show'));
	}
}