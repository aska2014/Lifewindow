<?php namespace Social;

class Post {

	public $title;
	public $link;
	public $description;
	public $date;
	public $author;

	public function __construct( $title, $link, $description, $date, $author )
	{
		$this->title       = \Str::words($title, 4);
		$this->link        = $link;
		$this->description = $description;
		$this->setDate($date);
		$this->author      = $author;
	}

	public function setDate( $date ) 
	{
		$this->date = \Language::date('F j, Y', $date);
	}


	public function getTitle()
	{
		return $this->title;
	}

	public function getLink()
	{
		return $this->link;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getDate()
	{
		return $this->date;
	}

	public function getAuthor()
	{
		return $this->author;
	}

}