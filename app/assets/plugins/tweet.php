<?php
if(Language::isArabic())
{
	Asset::add('tweet', 'ar/css/jquery.tweet.css'); 
}
else
{
	Asset::add('tweet', 'en/css/jquery.tweet.css'); 
}
Asset::add('tweet', 'js/tweet/jquery.tweet.js'); 