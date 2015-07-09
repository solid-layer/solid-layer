<?php

if (! function_exists('base_path')) {
    function base_path($extend_path)
    {
        return APP_ROOT . '/' . $extend_path;
    }
}

if (! function_exists('cp')) {
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
            } 


            # else, it is a file
            else {

                copy($item, $dest . '/' . $iterator->getSubPathName());
            }
        }
    }
}