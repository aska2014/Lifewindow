<?php

if(Language::isArabic())
{
	Asset::add('style', 'ar/css/style.css');
}
else
{
	Asset::add('style', 'en/css/style.css');
}


Asset::add('jquery', 'http://code.jquery.com/jquery-1.8.2.js');
Asset::add('mediaqueries', 'js/css3-mediaqueries.js');
Asset::add('custom', 'js/custom.js');
Asset::add('tabs', 'js/tabs.js');