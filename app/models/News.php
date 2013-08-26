<?php

class News extends ModelGallery {

	protected $table = 'news';

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
		return Language::getPrefixed( $this, 'small_description' );
	}

	/**
	 * Get large description depending on the language
	 *
	 * @return string
	 */
	public function getLargeDescription()
	{
		return Language::getPrefixed($this, 'large_description');
	}

	/**
	 * Get date for the project
	 *
	 * @return string
	 */
	public function getDate( $format = 'F j, Y' )
	{
		return Language::date($format, $this->created_at);
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

}