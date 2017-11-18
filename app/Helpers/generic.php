<?php
/**
 * Check if is in URL path for eg calendar or calendar/edit
 *
 * @param string $path
 * @param bool $absolute
 *
 * @return bool
 */
function isInPath(string $path, bool $absolute = false)
{
	if ($absolute) {
		return (string)\request()->path() === (string)$path;
	}

	return starts_with(\request()->path(), $path);
}

/**
 * Check if request path is in paths
 *
 * @param array $paths
 * @param bool $absolute true for absolute path,false for contains path
 *
 * @return bool
 */
function isInPaths(array $paths, bool $absolute = false)
{
	if ($absolute) {
		return in_array(\request()->path(), $paths, false);
	}

	foreach ($paths as $path) {
		if (starts_with(\request()->path(), $path)) {
			return true;
		}
	}

	return false;
}
