<?php

class Settings extends Eloquent {

	protected $table = 'website_settings';

	public static function getOnlyOne()
	{
		return static::orderBy('id', 'desc')->first();
	}

}