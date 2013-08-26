<?php

class Slider extends ModelGallery {

	protected $table = 'sliders';

	/**
	 * Get title
	 *
	 * @return string
	 */
	public function getTitle()
	{
		return Language::getPrefixed( $this, 'title' );
	}
}