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
// $x = env("KEYWORD_URL");


Route::prefix('/')->group(function(){
	Route::get('/','AgcController@index');
	// Route::get('/'.sitemapx()['keyword-url'].'/{kw}','AgcController@DOCS');
	Route::get('/dir/{link}/{kw}','AgcController@DOCS');
	Route::get('/sitemap_index.xml','AgcController@sitemap');
	Route::get('/sitemap-{id}.xml','AgcController@sitemapShow');
	Route::get('/sitemap.xml','AgcController@sitemap');
	Route::get('/robots.txt','AgcController@robot');
	Route::get('/feed','AgcController@feed');
	Route::get('/rss','AgcController@feed');
	Route::get('/atom','AgcController@feed');
	Route::get('/buildsitemap','AgcController@buildsitemap');
});

