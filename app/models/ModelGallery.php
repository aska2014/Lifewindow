<?php

use galleries\File as Gallery;

class ModelGallery extends Eloquent {
	
	/**
	 * Return true if the slider either has a video or image uploaded with it.
	 *
	 * @return bool
	 */
	public function hasImageOrVideo( $width, $height )
	{
		return $this->hasVideos() || $this->hasMainImage( $width, $height );
	}

	/**
	 * Get either the video or image. If both will return video
	 *
	 * @return Image|Video
	 */
	public function getImageOrVideo($width = 620, $height = 305 )
	{
		if($this->hasVideos())        return $this->getVideos($width, $height);

		elseif($this->hasMainImage( $width, $height )) return $this->getMainImage($width, $height);
	}

	/**
	 * Return true if this slider has video
	 *
	 * @return bool
	 */
	public function hasVideos()
	{
		$videos = $this->getVideos(0, 0);
		
		return ! empty( $videos );
	}

	/**
	 * Return all videos for this model if any
	 *
	 * @return Video[]
	 */
	public function getVideos( $width, $height )
	{
		return Video::make($this->videos_urls, $width, $height);
	}

	/**
	 * Return videos and images
	 *
	 * @return mixed
	 */
	public function getImagesAndVideos( $width, $height )
	{
		return array_merge($this->getImages($width, $height), $this->getVideos($width, $height));
	}
	
	/**
	 * Checks if this news has an image
	 *
	 * @return bool
	 */
	public function hasMainImage( $width, $height )
	{
		return Gallery::getMainImage($this, $width, $height) != null;
	}

	/**
	 * Get main or default image
	 *
	 * @param  integer $width
	 * @param  integer $height
	 * @return Image
	 */
	public function getMainOrDefaultImage( $width, $height )
	{
		if($this->hasMainImage( $width, $height ))

			return $this->getMainImage( $width, $height );
		
		else

			return $this->getDefaultImage( $width, $height );
	}

	/**
	 * Get main image
	 *
	 * @param  integer $width
	 * @param  integer $height
	 * @return Image
	 */
	public function getMainImage( $width, $height )
	{
		return Gallery::getMainImage( $this, $width, $height );
	}

	/**
	 * Get default image
	 *
	 * @param  integer $width
	 * @param  integer $height
	 * @return Image
	 */
	public function getDefaultImage( $width, $height )
	{
		return Gallery::getDefaultImage( $this, $width, $height );
	}

	/**
	 * Get all images
	 *
	 * @param  integer $width
	 * @param  integer $height
	 * @return Image[]
	 */
	public function getImages( $width, $height )
	{
		return Gallery::getImages($this, $width, $height);
	}

}