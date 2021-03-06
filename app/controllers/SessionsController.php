<?php

class SessionsController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        if(Auth::check()) {
            return Redirect::home();
        }

		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        // validate
        $input = Input::all();

        $attempt = Auth::attempt([
            'username' => $input['username'],
            'password' => $input['password']
        ]);

        if ($attempt) {
            Flash::message('Welcome '. Auth::user()['username'].'!');
            return Redirect::to('/');
        }

        Flash::error('There were errors with your login attempt'); // actualy validate the right way
        return Redirect::to('/login');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

        return Redirect::to('/');
	}


}
