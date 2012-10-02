<?php


/**
 * Load the Markdown library.
 */

if ( ! defined('MARKDOWN_VERSION'))
{
	require_once Bundle::path('bundocs').'/libraries/markdown.php';
}

/**
 * Get the root path for the documentation Markdown.
 *
 * @return string
 */
function bundocs_root($bundle)
{
	$dir = Bundle::path($bundle).'docs/';

	switch (true) 
	{
		case is_dir(Bundle::path($bundle).'docs/') : 
			return Bundle::path($bundle).'docs/';
			break;
		case is_dir(Bundle::path($bundle).'documentation/') :
			return Bundle::path($bundle).'documentation/';
			break;
	}

	return null;
}

/**
 * Get the parsed Markdown contents of a given page.
 *
 * @param  string  $page
 * @return string
 */
function bundocs_document($bundle, $page)
{
	return Markdown(file_get_contents(bundocs_root($bundle).$page.'.md'));
}

/**
 * Determine if a documentation page exists.
 *
 * @param  string  $page
 * @return bool
 */
function bundocs_document_exists($bundle, $page)
{
	return file_exists(bundocs_root($bundle).$page.'.md');
}

/**
 * Attach the sidebar to the documentation template.
 */
View::composer('bundocs::template', function($view)
{
	$sidebar = '';
	
	if (bundocs_document_exists($view->bundle, 'contents'))
	{
		$sidebar = bundocs_document($view->bundle, 'contents');
	}

	$view->with('sidebar', $sidebar);
});