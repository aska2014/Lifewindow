<?php

class Footer extends Eloquent {

	const FIRST_SECTION  = 1;
	const SECOND_SECTION = 2;

	protected $table = 'footer';

	/**
	 *
	 *
	 * @return string
	 */
	public function getTitle( $type )
	{
		return Language::getPrefixed($this, $this->toSection( $type ) . '_title');
	}

	/**
	 *
	 *
	 * @return string
	 */
	public function getDescription( $type )
	{
		return Language::getPrefixed($this, $this->toSection( $type ) . '_content');
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

	/**
	 *
	 *
	 * @return string
	 */
	public function toSection( $type )
	{
		return 'section' . $type;
	}


	public function address()
	{
		return $this->belongsTo('Address');
	}
}