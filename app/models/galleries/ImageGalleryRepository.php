<?php namespace galleries;

interface ImageGalleryRepository {

	/**
	 * Get service images
	 *
	 * @return Image[]
	 */
	public static function getImages( $model, $width, $height );

	/**
	 * Get service main image
	 *
	 * @return Image
	 */
	public static function getMainImage( $model, $width, $height );

	/**
	 * Get service main image
	 *
	 * @return Image
	 */
	public static function getDefaultImage( $model, $width, $height );

}