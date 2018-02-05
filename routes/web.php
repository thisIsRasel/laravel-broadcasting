<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/chat/{buddy}', 'ChatController@index');

Route::post('send_message', 'ChatController@store');

//Route::resource('product', 'ProductController');

Route::post('test', function(){

	event(new \App\Events\TestEvent());

	return 'event triggered';
});

Route::get('github_user', function(){

	$data = [];

	$client = new GuzzleHttp\Client();

	/*$credentials = [
		//['raselcse20@gmail.com', 'pass'], ['user@gmail.com', 'pass']
	];

	foreach($credentials as $crd) {
		$res = $client->get('https://api.github.com/user', ['auth' =>  $crd]);
		$body = $res->getBody();
		$data = json_decode($body);
	}

	return view('github', compact('data'));*/

	$url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet%2CcontentDetails&maxResults=25&playlistId=PL4IJAxR6Bqq8vP0kEeQRgU6lUe4s4u2DW&key=PL4IJAxR6Bqq8vP0kEeQRgU6lUe4s4u2DW";

	$res = $client->request('GET', 'https://www.googleapis.com/youtube/v3/playlistItems', 
		['query' => 'part=snippet%2CcontentDetails&maxResults=25&playlistId=PL4IJAxR6Bqq8vP0kEeQRgU6lUe4s4u2DW&key=PL4IJAxR6Bqq8vP0kEeQRgU6lUe4s4u2DW']);

	//$res = $client->get($url);
	$body = $res->getBody();
	$data = json_decode($body);

	return $data;
});