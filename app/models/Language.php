<?php

class Language {

	const ARABIC  = 'ar';
	const ENGLISH = 'en';

	/**
	 * Check if the current language is arabic
	 *
	 * @return bool
	 */
	public static function isArabic()
	{
		return static::getCurrent() == static::ARABIC;
	}

	/**
	 * Check if the current language is english
	 *
	 * @return bool
	 */
	public static function isEnglish()
	{
		return static::getCurrent() == static::ENGLISH;
	}

	/**
	 * Prepare language. Must be called before using laravel Lang class.
	 *
	 * @return void 
	 */
	public static function prepare()
	{
		App::setLocale(static::getCurrent());
	}

	/**
	 * Set current language
	 *
	 * @param  string $language
	 * @return void
	 */
	public static function setCurrent( $language )
	{
		Session::put('language', $language);
	}

	/**
	 * Get current language
	 *
	 * @return string
	 */
	public static function getCurrent()
	{
		return in_array(Session::get('language'), array(static::ARABIC, static::ENGLISH)) ? Session::get('language') : static::getDefault();
	}

	/**
	 * Get default language
	 *
	 * @return string
	 */
	public static function getDefault()
	{
		return App::make('Settings')->default_language == 'arabic' ? static::ARABIC : static::ENGLISH;
	}

	public static function date( $format, $date )
	{
		if(!static::isValidDate( $date )) return '';

		$dateTime = strtotime( $date );

		if(static::isEnglish()) 
		{
			return date($format, $dateTime);
		}

		else
		{

			$Ar = new arabic\ArabicDate('Date');
			  
			$fix = $Ar->dateCorrection (time());
			  
			$Ar->setMode(3);

			return $Ar->date($format, $dateTime, $fix); 
		}
	}

	/**
	 * Return true if the given date is valid (!= 1970/01/01)
	 *
	 * @return bool
	 */
	public static function isValidDate( $date )
	{
		return strtotime($date) != strtotime('01/01/1970');
	}

	/**
	 * Get database naming convention
	 *
	 * @return string
	 */
	public static function getPrefixed( $object, $name )
	{
		if(static::isArabic())
	
			$full = 'arabic_' . $name;
	
		else
	
			$full = 'english_' . $name;

		return $object->$full;
	}

}