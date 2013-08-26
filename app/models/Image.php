<?php

class Image extends HtmlElement {

	/**
	 * URL for this image
	 *
	 * @var string
	 */
	protected $source;

	/**
	 * Image title
	 *
	 * @var string
	 */
	protected $title;

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
	 * Create new image instance
	 *
	 * @param  string $source
	 * @param  string $name
	 * @param  string $description
	 * @return void
	 */
	public function __construct( $source, $title = '', $width = null, $height = null )
	{
		$this->source = $source;
		$this->title  = $title;
		$this->width  = $width;
		$this->height = $height;
	}

	/**
	 * Return image source.
	 *
	 * @return string
	 */
	public function getSource()
	{
		return $this->source;
	}

	/**
	 * Return image name.
	 *
	 * @return string
	 */
	public function getTitle()
	{
		if($this->title)

			return $this->title;

		return basename($this->getSource());
	}
	/**
	 * Return html for this image
	 * 
	 * @return string
	 */ 
	public function html()
	{
		$width  = $this->width  ? ' width ="' . $this->width  .'px"' : '';
		$height = $this->height ? ' height="' . $this->height .'px"' : '';
		return '<img src="'.$this->source.'" title="'.$this->title.'" '. $width . $height .'/>';
	}
}