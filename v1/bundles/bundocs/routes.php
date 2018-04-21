<?php

/**
 * Handle the documentation homepage.
 *
 * This page contains the "introduction" to Laravel.
 */

Route::get('(:bundle)', function()
{
	$bundles = array();
	
	foreach (Bundle::all() as $bundle => $config)
	{
		if ( ! is_null(bundocs_root($bundle))) 
		{
			$bundles[] = $bundle;
		}
	}

	// We need to get all available bundle
	return View::make('bundocs::page')
			->with('bundle', 'bundocs')
			->with('content', View::make('bundocs::list', array('bundles' => $bundles)));
});

Route::get('(:bundle)/(:any)', function($bundle)
{
	if (bundocs_document_exists($bundle, 'home'))
	{
		return View::make('bundocs::page')
			->with('bundle', $bundle)
			->with('content', bundocs_document($bundle, 'home'));
	}
	else
	{
		return Response::error('404');
	}
});

/**
 * Handle documentation routes for sections and pages.
 *
 * @param  string  $section
 * @param  string  $page
 * @return mixed
 */
Route::get('(:bundle)/(:any)/(:any?)/(:any?)', function($bundle, $page = null)
{
	$segments = func_get_args();
	$bundle   = array_shift($segments);
	$file     = rtrim(implode('/', $segments), '/');

	// If no page was specified, but a "home" page exists for the section,
	// we'll set the file to the home page so that the proper page is
	// displayed back out to the client for the requested doc page.
	if (is_null($page) and bundocs_document_exists($bundle, $file.'/home'))
	{
		$file .= '/home';
	}

	if (bundocs_document_exists($bundle, $file))
	{
		return View::make('bundocs::page')
				->with('bundle', $bundle)
				->with('content', bundocs_document($bundle, $file));
	}
	else
	{
		return Response::error('404');
	}
});