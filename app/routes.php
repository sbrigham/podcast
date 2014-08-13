<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
App::bind('Brigham\Podcast\Repositories\PodcastRepositoryInterface', 'Brigham\Podcast\Repositories\EloquentPodcastRepository');
App::bind('Brigham\Podcast\Services\PodcastServiceInterface', 'Brigham\Podcast\Services\PodcastService');

Route::get('/mail', function(){
   Mail::send('emails.errors.test', ['message' => 'Whatever'], function($message){
       $message->to('sdbrigha@buffalo.edu', 'Spencer')->subject('Welcome!');
   });
});

// Admin Routes

// TODO have different use roles to protect this
Route::group(['prefix' => 'admin', 'before' => 'auth'], function() {
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