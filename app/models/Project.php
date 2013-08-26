<?php

use galleries\File as Gallery;

class Project extends ModelGallery {

	protected $table = 'projects';

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
		return Gallery::getImageFromPath( $this, 'rotator' . $this->id . '.png', $width, $height );
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
	 * Get project skills
	 *
	 * @return string
	 */
	public function getSkills()
	{
		return $this->skills;
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
	 * Latest projects
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
	public static function before(Project $project)
	{
		return static::where('id', '<', $project->id)->first();
	}

	/**
	 * Get project after the given project
	 *
	 * @param  Project $project
	 * @return Project
	 */
	public static function after(Project $project)
	{
		return static::where('id', '>', $project->id)->first();
	}

}