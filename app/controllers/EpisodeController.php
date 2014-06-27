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
        // For now just show a show and it's episodes... can refactor later
        $show = $this->repo->getShow($show_id);

		return View::make('episode.index', compact('show'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}