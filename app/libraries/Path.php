<?php

class Path {


	const URL = 0;
	const SERVER = 1;

	/**
	 * Return weither the given url\path exists or not
	 *
	 * @todo
	 * @param  string $path
	 * @return bool
	 */
	public static function exists( $path )
	{
		try{
			file_get_contents($path);
			return true;
		} catch(Exception $e) {
			return false;
		}
	}

	public static function getAlbums( $type = self::URL )
	{
		return static::getBase( $type ) . '/albums';
	}

	public static function getBase( $type = self::URL )
	{
		if($type == self::URL)

			return 'http://www.misr-news.com/yarmook';

		elseif($type == self::SERVER)

			return 'http://www.misr-news.com/yarmook';
	}


	public static function convertToServer( $url )
	{
		return str_replace(static::getBase( self::URL ), static::getAlbums( self::SERVER ), $url);
	}

}