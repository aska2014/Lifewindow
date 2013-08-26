<?php

use Illuminate\Support\Facades\URL as LaravelURL;

class URL extends LaravelURL {

	public static function project( Project $project )
	{
		$englishTitle = static::prepareTitle($project->getEnglishTitle(), 3);

		return static::route( 'project', array($englishTitle, $project->id) );
	}

	public static function news( News $news )
	{
		$englishTitle = static::prepareTitle($news->getEnglishTitle(), 3);

		return static::route( 'one_news', array($englishTitle, $news->id) );
	}

	public static function page( Page $page )
	{
		$englishTitle = static::prepareTitle($page->getEnglishTitle(), 3);

		return static::route( 'page', array($englishTitle, $page->id) );
	}

	public static function service( Service $service )
	{
		$englishTitle = static::prepareTitle($service->getEnglishTitle(), 3);

		if($service->isService())

			return static::route( 'service', array($englishTitle, $service->id) );

		else

			return static::route( 'child-services', array($englishTitle, $service->id) );
	}

	private static function prepareTitle( $title, $max )
	{
		return Str::slug(Str::words($title, $max));
	}

}