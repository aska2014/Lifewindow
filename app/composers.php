<?php

View::composer('master.address', function($view)
{
	$view->address = Footer::onlyOne()->address;
});

View::composer(array('master', 'test'), function($view)
{
	if( !isset($view->title))

		$view->title = "Lifewindow";
	
	# Load assets
	Asset::addPlugins(array('tweet','superfish', 'pretty_photo', 'poshy_tip', 'flex_slider', 'less_framework', 'modernizr', 'move_form', 'dropdown'));
});


View::composer('home.index', function($view)
{
	Asset::addPlugins(array('banner_rotator'));
});

View::composer(array('services.all', 'projects.all'), function($view)
{
	Asset::addPlugins(array('gallery3d'));
});


View::composer('master.header', function($view)
{
	# Menu services and projects
	$view->services = Service::getMain( 6 );
	$view->projects = Project::latest( 6 );
	
	# Get all pages and extract about page from it
	# @todo make my order not giving about us page somthing
	# it doesn't deserve
	$pages     = Page::getExceptNested();
	$aboutPage = null;
	
	foreach($pages as $key => $page)
	{
		if(strtolower($page->getEnglishTitle()) == "about us")
		{
			$aboutPage = $page;

			unset($pages[$key]);
		}
	}

	$view->pages     = $pages;
	$view->aboutPage = $aboutPage;

	$view->news = News::latest( 3 );

	$view->menuChars = App::make('Settings')->menu_chars;
});

View::composer('master.footer', function($view)
{
	$view->news = News::latest( 3 );

	$view->footer  = Footer::onlyOne();
	$view->links   = App::make('Links');
});
