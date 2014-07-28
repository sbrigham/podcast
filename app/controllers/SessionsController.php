<?php

class SessionsController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
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
            'email' => $input['email'],
            'password' => $input['password']
        ], true);

        if ($attempt) return Redirect::intended('/');

        dd('invalid login credentials');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

        return Redirect::home();
	}


}
