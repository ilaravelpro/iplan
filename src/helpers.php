<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/13/20, 8:07 AM
 * Copyright (c) 2020. Powered by iamir.net
 */

function iplan_path($path = null)
{
    $path = trim($path, '/');
    return __DIR__ . ($path ? "/$path" : '');
}

function iplan($key = null, $default = null)
{
    return iconfig('iplan' . ($key ? ".$key" : ''), $default);
}
