<?php

class Links extends Eloquent {

	protected $table = 'website_links';

	public static function getOnlyOne()
	{
		return static::orderBy('id', 'desc')->first();
	}


}