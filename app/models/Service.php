<?php

use galleries\File as Gallery;

class Service extends ModelGallery {

	protected $table = 'services';

	const MAIN_SERVICE = 0;
	const SUB_SERVICE  = 1;
	const SERVICE      = 2;

	/**
	 * Get title depending on the language
	 *
	 * @return string
	 */
	public function getTitle()
	{
		return Language::getPrefixed( $this, 'title' );
	}
	

	/**
	 * Get the rotator image for the service
	 *
	 * @return void
	 */
	public function getRotatorImage( $width = 0, $height = 0 )
	{
		if($image = Gallery::getImageFromPath( $this, 'rotator' . $this->id . '.png', $width, $height ))
		
			return $image;

		return $this->getMainImage( 436, 273 );
	}

	/**
	 * Get english title
	 *
	 * @return string
	 */
	public function getEnglishTitle()
	{
		return $this->english_title;
	}

	/**
	 * Get arabic title
	 *
	 * @return string
	 */
	public function getArabicTitle()
	{
		return $this->arabic_title;
	}

	/**
	 * Get small description depending on the language
	 *
	 * @return string
	 */
	public function getSmallDescription()
	{
		return stripslashes(Language::getPrefixed( $this, 'small_description' ));
	}

	/**
	 * Get large description depending on the language
	 *
	 * @return string
	 */
	public function getLargeDescription()
	{
		return stripslashes(Language::getPrefixed($this, 'large_description'));
	}

	/**
	 * Get date for the project
	 *
	 * @return string
	 */
	public function getDate()
	{
		return Language::date('F j, Y', $this->the_date);
	}

	/**
	 * Check if has date
	 *
	 * @return bool
	 */
	public function hasDate()
	{
		return $this->getDate() != '';
	}

	/**
	 * Latest Services
	 *
	 * @param  integer $num
	 * @return Collection
	 */
	public static function latest( $num )
	{
		return static::take( $num )->get();
	}

	/**
	 * Get project before the given project
	 *
	 * @param  Project $project
	 * @return Project
	 */
	public static function before(Service $project)
	{
		return static::where('id', '<', $project->id)->where('type', $project->type)->first();
	}

	/**
	 * Get project after the given project
	 *
	 * @param  Project $project
	 * @return Project
	 */
	public static function after(Service $project)
	{
		return static::where('id', '>', $project->id)->where('type', $project->type)->first();
	}

	public static function getByType( $type, $max = null )
	{
		if($max)
			return static::where( 'type', $type )->take($max)->get();
		return static::where( 'type', $type )->get();
	}

	/**
	 * Get all main services
	 *
	 * @return Collection
	 */
	public static function getMain( $max )
	{
		return static::where('type', static::MAIN_SERVICE)->take( $max )->get();
	}

	/**
	 * Get parent object.
	 *
	 * @return Service
	 */
	public function getParent()
	{
		$query = $this->where('id', $this->service_id)->first();
	}

	/**
	 * Return all children.
	 *
	 * @return Query
	 */
	public function getChildren( $onlyBelowType = false )
	{
		$query = $this->where('service_id', $this->id);

		if($onlyBelowType)

			return $query->where('type', $this->getBelowType());

		return $query;
	}

	public function getBelowType()
	{
		return $this->type == static::MAIN_SERVICE ? static::SUB_SERVICE : static::SERVICE;
	}

	/**
	 * Is main service.
	 *
	 * @return bool
	 */
	public function isMain()
	{
		return $this->type == static::MAIN_SERVICE;
	}

	/**
	 * Is sub service.
	 *
	 * @return bool
	 */
	public function isSub()
	{
		return $this->type == static::SUB_SERVICE;
	}

	/**
	 * Is bottom service.
	 *
	 * @return bool
	 */
	public function isService()
	{
		return $this->type == static::SERVICE;
	}

}