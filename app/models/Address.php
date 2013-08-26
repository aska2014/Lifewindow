<?php

class Address extends Eloquent {

	/**
	 * Table name
	 *
	 * @var string
	 */
	protected $table = 'address';

	public function getAddress()
	{
		return Language::getPrefixed( $this, 'address' );
	}

	public function getDescription()
	{
		return Language::getPrefixed( $this, 'description' );
	}

	public function getPhone()
	{
		return $this->telephone;
	}

	public function getMobile()
	{
		return $this->mobile_no;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function footer()
	{
		return $this->hasOne('Footer');
	}

}