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



//Route::get('{all}', function()
//{
//	return View::make('under_construction');
//
//})->where('all', '.*');


Route::get('/home', array('as' => 'home', function()
{

	$view = View::make('home.index');

	$view->title    = "Life window | Home ";
	$view->sliders  = Slider::all();
	$view->services = Service::getMain( App::make('Settings')->home_services_no );
	$view->projects = Project::latest( App::make('Settings')->home_projects_no );

	$view->useSlider = App::make('Settings')->show_home_slider;
	$view->useBanner = App::make('Settings')->show_home_banner;

	$view->largeBlockChars = Language::getPrefixed(App::make('Settings'), 'large_chars');
	$view->smallBlockChars = Language::getPrefixed(App::make('Settings'), 'small_chars');

	return $view;
}));



Route::get('projects', array('as' => 'projects', function()
{
	$view = View::make('projects.all');

	$view->projects    = Project::paginate(9);
	$view->title       = "Life window | Projects";
	$view->useRotator  = App::make('Settings')->show_projects_rotator;
	$view->rotatorType = "projects";

	$view->largeBlockChars = Language::getPrefixed(App::make('Settings'), 'large_chars');

	return $view;
}));

// Main services
Route::get('services', array('as' => 'services', function()
{
	$view = View::make('services.main');

	$view->title    = "Life window | Services";
	$view->subTitle = Str::upper(Lang::get('words.services'));

	$view->rotatingServices = Service::getByType(Service::MAIN_SERVICE);
	$view->services         = Service::getMain(9);

	$view->useRotator = App::make('Settings')->show_services_rotator;
	$view->rotatorType = "services";

	$view->largeBlockChars = Language::getPrefixed(App::make('Settings'), 'large_chars');

	return $view;
}));

// Child services: This could be sub services or services.
Route::get('services/{title}-{id}', array('as' => 'child-services', function( $title, $id )
{
	$view = View::make('services.all');

	$view->title    = "Life window | Services";
	
	$view->parentService    = Service::findOrFail( $id );
	$view->subTitle         = $view->parentService->getTitle();
	
	$view->rotatingServices = Service::getByType($view->parentService->type);
	$view->services         = $view->parentService->getChildren( true )->paginate(9);

	if($view->services->isEmpty()) {
		$view->services = $view->parentService->getChildren()->paginate(9);
	}

	$view->useRotator = App::make('Settings')->show_services_rotator;
	$view->rotatorType = "services";

	$view->largeBlockChars = Language::getPrefixed(App::make('Settings'), 'large_chars');


	return $view;
}))->where('id', '[0-9]+')->where('title', '.*');



Route::get('project/{title}-{id}', array('as' => 'project', function( $title, $id )
{
	$view = View::make('projects.one');

	$view->project = Project::findOrFail($id);
	$view->title    = "Life window | " . $view->project->getEnglishTitle();
	$view->previousProject = Project::before($view->project);
	$view->nextProject     = Project::after ($view->project);
	$view->relatedProjects = Project::latest(4);

	return $view;

}))->where('id', '[0-9]+')->where('title', '.*');



Route::get('service/{title}-{id}', array('as' => 'service', function($title, $id)
{
	$view = View::make('services.one');

	$view->service = Service::findOrFail($id);
	$view->title    = "Life window | " . $view->service->getEnglishTitle();
	$view->previousService = Service::before($view->service);
	$view->nextService     = Service::after ($view->service);
	$view->relatedServices = Service::getByType( Service::SERVICE, 4);

	return $view;

}))->where('id', '[0-9]+')->where('title', '.*');



Route::get('news', array('as' => 'all_news', function()
{
	$view = View::make('news.all');

	$view->news  = News::paginate( 3 );
	$view->services = Service::latest(10);
	$view->projects = Project::latest(10);
	$view->title = "Life window | News";

	return $view;

}));



Route::get('news/{title}-{id}', array('as' => 'one_news', function($title, $id)
{
	$view = View::make('news.one');

	$view->news = News::findOrFail( $id );
	$view->services = Service::latest(10);
	$view->projects = Project::latest(10);
	$view->title = "Life window | " . $view->news->getEnglishTitle();

	return $view;

}))->where('id', '[0-9]+')->where('title', '.*');




Route::get('page/{pageName}-{id}', array('as' => 'page', function($pageName, $id)
{
	$view = View::make('pages.index');

	$view->page = Page::findOrFail($id);
	$view->title = 'Life window | ' . $view->page->getEnglishTitle() ;
	$view->services = Service::latest(10);
	$view->projects = Project::latest(10);

	return $view;

}))->where('id', '[0-9]+')->where('pageName', '.*');



Route::get('language/{language}', array('as' => 'language', function($language)
{
	Language::setCurrent( $language );

	try{
		return Redirect::back();
	}catch(Exception $e) {
		return Redirect::to('');
	}

}));

Route::get ('contact-us', array('as' => 'contact', 'uses' => 'ContactController@getIndex'));
Route::post('contact-us', array('uses' => 'ContactController@postIndex'));

Route::get('services-xml', 'XmlController@services');
Route::get('projects-xml', 'XmlController@projects');

Route::get('request-social-facebook', array('as' => 'request-facebook', function( )
{
	$facebook = new Social\Facebook( '551870901518231' );
	$facebookPosts = $facebook->fetchPosts(3);

	return Response::json($facebookPosts);
}));

Route::get('request-social-twitter', array('as' => 'request-twitter', function( )
{
	$twitter = new Social\Twitter( 'Lifewindow1' );
	$twitterPosts = $twitter->fetchPosts(3);

	return Response::json($twitterPosts);
}));





// Route::get('convert-images/sliders' , 'ImageConverterController@sliders' );
// Route::get('convert-images/services', 'ImageConverterController@services');
// Route::get('convert-images/projects', 'ImageConverterController@projects');