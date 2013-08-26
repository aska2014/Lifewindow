<?php namespace Social;

class Twitter {

	protected $username;

	public function __construct( $username )
	{
		$this->username = $username;
	}

	public function fetchPosts( $number )
	{
	    // Without this "ini_set" Facebook's RSS url is all screwy for reading!
	    // This is the most essential line, don't forget it.
	    ini_set('user_agent', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.9) Gecko/20071025 Firefox/2.0.0.9');

	    // This URL is the URL to the Facebook Page's RSS feed.
	    // Go to the page's profile, and on the left-hand side click "Get Updates vis RSS"
	    $rssUrl = "http://api.twitter.com/1/statuses/user_timeline/" . $this->username . ".rss";

		$url_headers = @get_headers($rssUrl);

		if($url_headers[0] == 'HTTP/1.0 200 OK' || $url_headers[0] == 'HTTP/1.1 200 OK') {

		  $xml = simplexml_load_file($rssUrl);

		} else {

			return array();
		}

	    // This creates an array called "entry" that puts each <item> in FB's
	    // XML format into the array
	    $entry = $xml->channel->item;
	    $posts = array();

	    $max = count($entry) < $number ? count($entry) : $number;

	    // Now we'll loop through are array. I just have it going up to 3 items
	    // for this example.
	    for ($i = 0; $i < $max; $i++)
	    {
	    	$posts[] = new Post((string)$entry[$i]->title, (string)$entry[$i]->link, (string)$entry[$i]->description, (string)$entry[$i]->pubDate, (string)$entry[$i]->author);
	    }

	    return $posts;
	}



}