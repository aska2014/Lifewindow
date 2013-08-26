<?php

if(Language::isArabic())
{
	Asset::add('lessframework', 'ar/css/lessframework.css');
}
else
{
	Asset::add('lessframework', 'en/css/lessframework.css');
}