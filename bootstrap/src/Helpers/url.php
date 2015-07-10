<?php


if (! function_exists('back')) {
    function back()
    {
        return  di()->get('url')->previous();
    }
}