<?php

class Contact extends Eloquent {

	protected $table = 'contact';

	/**
	 *
	 *
	 * @return string
	 */
	public function getDescription()
	{
		return Language::getPrefixed($this, 'description');
	}

	public function getLatitude()
	{
		return (double) $this->longitude;
	}

	public function getLongitude()
	{
		return (double) $this->longitude;
	}

	/**
	 *
	 *
	 * @return Footer
	 */
	public static function onlyOne()
	{
		return static::orderBy('id', 'desc')->first();
	}
}