<?php

Route::filter('admin', function()
{
    if (! Auth::user()->hasRole('admin')) {
        return Redirect::to('/');
    }
;});

App::bind('Brigham\Podcast\Repositories\PodcastRepositoryInterface', 'Brigham\Podcast\Repositories\EloquentPodcastRepository');
App::bind('Brigham\Podcast\Services\PodcastServiceInterface', 'Brigham\Podcast\Services\PodcastService');

Route::get('/mail', function(){
   Mail::send('emails.errors.test', ['message' => 'Whatever'], function($message){
       $message->to('sdbrigha@buffalo.edu', 'Spencer')->subject('Welcome!');
   });
});

// Admin Routes

Route::group(['prefix' => 'admin', 'before' => 'admin'], function() {
    Route::get('/', 'AdminDashboardController@index');

    Route::resource('rss', 'RssFeedController',
        array('except' => array('show')));

    Route::resource('user', 'UsersController',
        array('except' => array('show')));

    Route::resource('category', 'CategoryController');
});

Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController', ['only' => ['index', 'create', 'destroy' , 'store']]);

Route::post('episode/rating', ['as' => 'episode.rating', 'uses' => 'EpisodeRatingController@store']);

Route::resource('register', 'RegistrationController');
Route::get('register', 'RegistrationController@create');

Route::resource('session', 'EpisodeSessionController', ['only' => ['index', 'store']]);

Route::get('/', ['as'=>'home', 'uses' => 'ShowController@index']);
Route::get('/env', function(){
    exit('poo');
});

Route::get('show', 'ShowController@index');
Route::get('shows',['as' =>'shows', 'uses' => 'ShowController@index']);
Route::get('show/all', 'ShowController@all');

Route::get('episodes', ['as' => 'episodes', 'uses' => 'EpisodeController@index']);
Route::get('episode/{episode}', ['as' => 'episode.id', 'uses' => 'EpisodeController@show']);
Route::get('episodes/all', 'EpisodeController@all');

// Brigham Front Routes
Route::get('/{show_id}/about', 'ShowController@show');
Route::get('/{show_id}', [ 'as'=> 'show', 'uses' => 'ShowController@show']);
Route::get('/{show_id}/episode/{episode_id}', ['as' => 'episode', 'uses' => 'EpisodeController@show']);

// Handle 404 Error

App::missing(function($exception)
{
    return Response::view('errors.missing', array(), 404);
});