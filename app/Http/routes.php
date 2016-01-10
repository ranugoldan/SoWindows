<?php
	

$router->bind('news', function($slug)
{
	return App\News::whereSlug($slug)->firstOrFail();
});

$router->bind('cat', function($cat)
{
	$kat_id = App\Kategori::where('nama_kategori', $cat)->firstOrFail()->id;
	return $kat_id;
});


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

get('/search', ['as'=>'search', 'uses'=> 'HomeController@search']);
get('/admin', ['as'=> 'admin', 'uses'=> 'AdminController@index']);
get('/admin/login', ['as'=> 'admin_login', 'uses'=> 'AdminController@login']);
get('/admin/posts', ['as'=> 'admin_posts', 'uses'=> 'AdminController@posts']);
get('/admin/posts/create', ['as'=> 'admin_create', 'uses'=> 'AdminController@create']);
get('/admin/posts/{news}/edit', ['as'=> 'admin_edit', 'uses'=> 'AdminController@edit']);
get('/admin/posts/{news}/delete', ['as'=> 'admin_delete', 'uses'=> 'AdminController@delete']);
get('/admin/posts/{news}/destroy', ['as'=> 'admin_destroy', 'uses'=> 'AdminController@destroy']);
post('/admin/post', ['as'=>'admin_store', 'uses'=>'AdminController@store']);
patch('/{news}', ['as'=>'admin_update', 'uses'=> 'AdminController@update']);


get('/search', ['as'=>'search', 'uses'=> 'HomeController@search']);
get('home', ['as'=> 'home', 'uses' => 'HomeController@index']);
get('/category/{cat}','HomeController@category');
get('/', ['as' => 'root', 'uses' => 'HomeController@index']);
get('/{news}',['as'=>'news_path','uses'=>'HomeController@show']);
post('/comment', ['as'=>'storeComment', 'uses'=>'HomeController@storeComment']);

//$router->bind('songs', function($slug)
//{
//	return App\Song::where('slug' , $slug)->first();
//});

//$router->resource('songs','SongsController');

//get('songs',['as'=>'songs_path','uses'=>'SongsController@index']);
//get('songs/{song}' ,['as'=>'song_path','uses'=>'SongsController@show']);
//get('songs/{song}/edit', 'SongsController@edit');
//patch('songs/{song}', 'SongsController@update');

/*$router->resource('songs', 'SongsController',[
	'only'=> [
		'index','show', 'edit', 'update'
	]
]);*/