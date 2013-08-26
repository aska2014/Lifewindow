<?php

class Page extends Eloquent {

	protected $table = 'pages';

	/**
	 * Get pages except nested ones
	 *
	 * @return 2d array
	 */
	public static function getExceptNested()
	{
		$pages = array();

		foreach (static::all() as $page)
		{
			if(! $page->getParent())
			{
				array_push($pages, $page);
			}
		}

		return $pages;
	}

	/**
	 * Get by english title of the page
	 *
	 * @param  string $title
	 * @return Page
	 */
	public static function getByEnglishTitle( $title )
	{
		return static::where('title', '=', $title)->first();
	}

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
	 * Get large description depending on the language
	 *
	 * @return string
	 */
	public function getLargeDescription()
	{
		return Language::getPrefixed($this, 'large_description');
	}

	/**
	 * Get nested pages
	 * 
	 * @return Collection
	 */
	public function getNested()
	{
		return static::where('page_id', $this->id)->get();
	}

	/**
	 * Get parent page
	 *
	 * @return Page
	 */
	public function getParent()
	{
		return static::where('id', $this->page_id)->first();
	}
}