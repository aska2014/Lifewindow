<?php

class Banner extends ModelGallery {

	protected $table = 'banners';

	/**
	 * Get all banners
	 *
	 * @return Image[]
	 */
	public static function getAllImages( $width, $height )
	{
		$banners = array();

		$all = static::all();

		return $all[0]->getImages( $width, $height );
	}

}