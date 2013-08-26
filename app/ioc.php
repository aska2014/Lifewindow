<?php

App::bind('Settings', function()
{
	return Settings::getOnlyOne();
});

App::bind('Links', function()
{
	return Links::getOnlyOne();
});