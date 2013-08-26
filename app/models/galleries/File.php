<?php namespace galleries;

use Str, Image, URL;

class File implements ImageGalleryRepository {

	protected static $map = array(

		'220x138' => '436x273',
		'300x188' => '436x273',
		'620x305' => '712x351'

	);

	/**
	 * Get service images
	 *
	 * @return Image[]
	 */
	public static function getImages( $model, $width, $height )
	{
		$name = strtolower(get_class($model));

		$images = array();

		$dimensions = static::getDimensions($width, $height);

		$pattern = public_path() . '/albums/' . Str::plural($name) . '/' . $dimensions .'/' . $name . $model->id.'-*.jpg';

		foreach(glob($pattern) as $image)
		{
			$images[] = new Image( static::getAlbumsUrl() . '/' . Str::plural($name) . '/' . $dimensions .'/' . basename($image), static::modelTitle($model) );
		}

		$pattern = public_path() . '/albums/' . Str::plural($name) . '/' . $dimensions .'/' . $name . $model->id.'.jpg';

		foreach(glob($pattern) as $image)
		{
			$images[] = new Image( static::getAlbumsUrl() . '/' . Str::plural($name) . '/' . $dimensions .'/' . basename($image), static::modelTitle($model) );
		}

		return $images;
	}

	/** 
	 * Get model title
	 *
	 * @param  mixed $model
	 * @return string
	 */
	public static function modelTitle( $model )
	{
		return method_exists($model, 'getTitle') ? $model->getTitle() : '';
	} 

	/**
	 * Get service main image
	 *
	 * @return Image
	 */
	public static function getMainImage( $model, $width, $height )
	{
		$images = static::getImages($model, $width, $height);

		if(!empty($images)) return $images[0];
	}

	/**
	 * Get service main image
	 *
	 * @return Image
	 */
	public static function getDefaultImage( $model, $width, $height )
	{
		$name = strtolower(get_class($model));

		$dimensions = static::getDimensions($width, $height);

		if(file_exists(public_path() . '/albums/' . Str::plural($name) . '/default.jpg'))

			return new Image( static::getAlbumsUrl() . '/' . Str::plural($name) . '/default.jpg', static::modelTitle($model) );
		else
			
			return new Image( '', $model->getTitle());
	}

	/**
	 * Return image if exists, false if not
	 *
	 * @param  mixed  $model
	 * @param  string $path
	 * @return string|false
	 */
	public static function getImageFromPath( $model, $path, $width = 200, $height = 200 )
	{
		$name = strtolower(get_class($model));
		
		if(file_exists(public_path() . '/albums/' . Str::plural($name) . '/' . $path ))

			return new Image(static::getAlbumsUrl() . '/' . Str::plural($name) . '/' . $path, static::modelTitle($model));

		else

			return false;
	}


	public static function getDimensions( $width, $height )
	{
		return isset(static::$map[$width . 'x' . $height]) ? static::$map[$width . 'x' . $height] : $width . 'x' . $height;
	}

	public static function getAlbumsUrl()
	{
		return URL::asset('albums');
	}

}