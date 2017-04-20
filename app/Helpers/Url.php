<?php

function localizedRoute($language_code, $route_name = null, $parameters = null) {
	
	$route_name = $route_name ?: Route::currentRouteName();

	$route_name = explode('.', $route_name);

	if (isset($route_name[0]) AND in_array($route_name[0], array_keys(Config::get('languages')))) {
		array_shift($route_name);
	}

	if ($language_code != 'en') {

		array_unshift($route_name, $language_code);

	}

	$route_name = implode('.', $route_name);

	return $parameters ? route($route_name, $parameters): route($route_name);
}