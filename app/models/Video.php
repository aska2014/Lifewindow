<?php

class Video extends HtmlElement {

	/**
	 * Url for the video 
	 *
	 * @var string
	 */
	protected $url;

	/**
	 * Width of the video
	 *
	 * @var integer
	 */
	protected $width;

	/**
	 * Height of the video
	 *
	 * @var integer
	 */
	protected $height;

	/**
	 * Create new video instance.
	 *
	 * @param  string $url
	 * @return void
	 */
	public function __construct( $url, $width = 450, $height = 366)
	{
		$this->url    = $url;
		$this->width  = $width;
		$this->height = $height;
	}

	/**
	 * Factory method. Create videos from given string
	 *
	 * @return Video[]
	 */
	public static function make( $urls, $width = 450, $height = 366 )
	{
		$urls   = explode('<=======>', $urls);
		$videos = array();

		foreach ($urls as $url)
		{
			if(static::validUrl($url))

				$videos[] = new Static( $url, $width, $height );
		}

		return $videos;
	}

	/**
	 * Check if valid Url
	 *
	 * @param  string $url
	 * @todo
	 * @return bool
	 */
	public static function validUrl( $url )
	{
		return preg_match('/https?:\/\/youtube.com\/watch\?v=[a-zA-Z0-9-]+$/', $url)
			|| preg_match('/https?:\/\/www.youtube.com\/watch\?v=[a-zA-Z0-9-]+$/', $url);
	}

	/**
	 * Get video Url.
	 *
	 * @return string
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * Get the youtube embed html.
	 *
	 * @return string
	 */
	public function html()
	{
		return $this->getYoutube();
	}

	/**
	 * Checks if it's a youtube url and then return the embded string.
	 *
	 * @link http://www.tools4noobs.com/online_tools/youtube_xhtml/
	 * @return string|false
	 */
	public function getYoutube()
	{
		$modified = str_replace('watch?v=', 'v/', $this->url);
		return '<object width="'. $this->width .'" height="'. $this->height .'"><param name="movie" value="'. $modified .'?hl=en_US&amp;version=3"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="'. $modified .'?hl=en_US&amp;version=3" type="application/x-shockwave-flash" width="'. $this->width .'" height="'. $this->height .'" allowscriptaccess="always" allowfullscreen="true"></embed></object>';
	}
}