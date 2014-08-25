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
        $shows = $this->repo->getShows();
        foreach($shows as $show => $value) {
            $shows[$show]->name = htmlspecialchars_decode($shows[$show]->name);
        }

        return Response::json($shows);
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
        $show->name = html_entity_decode($show->name);

        return Response::json($show);
	}
}