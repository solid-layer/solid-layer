<?php

if (!function_exists('base_path')) {
    function base_path($extend_path = null)
    {
        return APP_ROOT . '/' . $extend_path;
    }
}

if (!function_exists('app_path')) {
    function app_path($extend_path = null)
    {
        return base_path() . 'app/' . $extend_path;
    }
}

if (!function_exists('config_path')) {
    function config_path($extend_path = null)
    {
        return base_path() . 'config/' . '/' . $extend_path;
    }
}

if (!function_exists('database_path')) {
    function database_path($extend_path = null)
    {
        return base_path() . 'database/' . $extend_path;
    }
}

if (!function_exists('storage_path')) {
    function storage_path($extend_path = null)
    {
        return base_path() . 'storage/' . $extend_path;
    }
}

if (!function_exists('public_path')) {
    function public_path($extend_path = null)
    {
        return base_path() . 'public/' . $extend_path;
    }
}

if (!function_exists('resources_path')) {
    function resources_path($extend_path = null)
    {
        return base_path() . 'resources/' . $extend_path;
    }
}

if (!function_exists('sandbox_path')) {
    function sandbox_path($extend_path = null)
    {
        return base_path() . 'sandbox/' . $extend_path;
    }
}

if (!function_exists('cp')) {
    function cp($source, $dest)
    {
        if (is_dir($dest) == false) {
            mkdir($dest, 0755, true);
        }

        $iterator = new \RecursiveIteratorIterator
        (
            new \RecursiveDirectoryIterator(
                $source,
                \RecursiveDirectoryIterator::SKIP_DOTS
            ),
            \RecursiveIteratorIterator::SELF_FIRST
        );

        foreach ($iterator as $item) {

            # check if the item is directory
            if ($item->isDir()) {

                # check if there is existing directory
                # else create.
                $_temp_dir = $dest . '/' . $iterator->getSubPathName();
                if (is_dir($_temp_dir) == false) {
                    mkdir($dest . '/' . $iterator->getSubPathName(), true);
                }
            } # else, it is a file
            else {

                copy($item, $dest . '/' . $iterator->getSubPathName());
            }
        }
    }
}

if (!function_exists('remove_double_slash')) {
    function remove_double_slash($path)
    {
        return str_replace('//', '/', $path);
    }
}