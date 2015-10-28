<?php
namespace Bootstrap\Console\Clear;

trait ClearTrait
{
    public function clear($path)
    {
        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path,
                \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::CHILD_FIRST
        );

        $ignore = [
            '.gitignore',
        ];

        foreach ($files as $file) {
            if (in_array($file->getFileName(), $ignore)) {
                continue;
            }

            if ($file->isDir()) {
                rmdir($file->getRealPath());
            } else {
                unlink($file->getRealPath());
            }
        }
    }
}
