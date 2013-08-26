<?php namespace galleries;

use Str, Image;

class XML implements ImageGalleryRepository {

	/**
	 * Save galleries after loaded from server
	 *
	 * @var Collection
	 */
	protected static $loaded_galleries;

	/**
	 * Get service images
	 *
	 * @param  Eloquent $model
	 * @return Image[]
	 */
	public static function getImages( $model, $width = null, $height = null )
	{
		$galleries = static::load();

		$name = strtolower(get_class( $model ));

		$images = array();

		if(!isset($galleries[ Str::plural($name) ])) return array();
		
		foreach ($galleries[ Str::plural($name) ] as $image)
		{
			if(preg_match('/'. $name .$model->id.'\-[0-9]+\.jpe?g/', $image))

				$images[] = new Image( 'http://www.misr-news.com/yarmook/albums/'. Str::plural($name) . '/' . $image, $model->getTitle(), $width, $height );
		}
		
		return $images;
	}

	/**
	 * Get service main image
	 *
	 * @param  Eloquent $model
	 * @return Image
	 */
	public static function getMainImage( $model, $width = null, $height = null )
	{
		$images = static::getImages( $model, $width, $height );

		return empty($images) ? null : $images[0];
	}

	/**
	 * Get service main image
	 *
	 * @return Image
	 */
	public static function getDefaultImage( $model, $width, $height )
	{
		$name = strtolower(get_class( $model ));
		return new Image( 'http://www.misr-news.com/yarmook/albums/'. Str::plural($name) . '/default.jpg', $model->getTitle(), $width, $height );
	}

	/**
	 * Load galleries from the XML file on the server
	 *
	 * @return Collection
	 */
	protected static function load()
	{
		if(static::$loaded_galleries) return static::$loaded_galleries;

		$filename = 'http://www.misr-news.com/yarmook/server/albums_xml.php?apppassword=APPPassword';

		$xml = simplexml_load_file($filename);

		$galleries = array();

		foreach ($xml->children() as $xml_gallery)
		{
			foreach ($xml_gallery->images->children() as $xml_image)
			{
				$galleries[(string)$xml_gallery->name][] = (string)$xml_image;
			}
		}

		return static::$loaded_galleries = $galleries;
	}
}