<?php

if(Language::isArabic())
{
	Asset::add('flexslider', 'ar/css/flexslider.css');
}
else
{
	Asset::add('flexslider', 'en/css/flexslider.css');
}

Asset::add('flexslider', 'js/jquery.flexslider-min.js');