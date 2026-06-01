<?php

if (! function_exists('activeRoute')) {
    function activeRoute($route)
    {
        return request()->routeIs($route) ? 'active' : '';
    }
}
