<?php

if(Language::isArabic())
{
	Asset::add('superfish', 'ar/css/superfish.css');
}
else
{
	Asset::add('superfish', 'en/css/superfish.css');
}
Asset::add('hoverIntent', 'js/superfish-1.4.8/js/hoverIntent.js');
Asset::add('superfish', 'js/superfish-1.4.8/js/superfish.js');
Asset::add('supersubs', 'js/superfish-1.4.8/js/supersubs.js');