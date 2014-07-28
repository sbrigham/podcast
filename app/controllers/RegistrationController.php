<?php

use Brigham\Services;
use Brigham\User\Forms\RegistrationForm;
use Brigham\User\Services\UserService;

class RegistrationController extends \BaseController {
    protected $userService;
    protected $regForm;
    /**
     * @var Brigham\User\Services\UserService;
     */

    public function __construct(RegistrationForm $regForm, UserService $userService)
    {
        $this->regForm = $regForm;
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('user.registration.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $this->regForm->validate(Input::all());
        $user = $this->userService->make(Input::all());
        Auth::login($user);

        Flash::success('Thank you for creating an account!');

        return Redirect::route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
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
