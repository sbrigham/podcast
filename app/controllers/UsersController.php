<?php

use Brigham\Services;
use Brigham\Services\UserService;
use Brigham\Services\Validation\ValidationException;

class AdminUsersController extends \BaseController {
    protected $userService;

    /**
     * @var Brigham\Services\UserService;
     */

    public function __construct(UserService $userService)
    {
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
        return View::make('admin.users.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        try{
            $user = $this->userService->make(Input::all());
        } catch(ValidationException $e){
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }

        // TODO redirect with messages -> user has been created? in modal?
        return Redirect::route('admin.users.index');
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
