<?php

if(Language::isArabic())
{
	Asset::add('skin', 'ar/css/skin.css');
}
else
{
	Asset::add('skin', 'en/css/skin.css');
}
