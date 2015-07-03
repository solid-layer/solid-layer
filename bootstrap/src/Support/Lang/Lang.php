<?php

namespace Bootstrap\Support\Lang;

use Bootstrap\Exceptions\LangFileNotFoundException;

class Lang
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    protected function _getAttribute($path)
    {
        $exploded = explode('.', $path);

        return [
            'file' => $this->path . '/' . $exploded[0] . '.php',
            'exploded' => $exploded,
        ];
    }

    protected function _hasFile($file)
    {
        if (! file_exists($file)) {
            return false;
        }

        return true;
    }

    protected function _getDottedFile($file)
    {
        $array = require $file;

        return array_dot($array);
    }

    public function has($path)
    {
        $attribute = $this->_getAttribute($path);

        if (! $this->_hasFile($attribute['file'])) {
            return false;
        }

        return true;
    }

    public function get($path, $params = [])
    {
        $attribute = $this->_getAttribute($path);

        if (! $this->_hasFile($attribute['file'])) {
            throw new LangFileNotFoundException("File {$file} not found!");
        }

        # get all the arrays with messages
        $templates = $this->_getDottedFile($attribute['file']);

        # get the file name
        $file_name = $attribute['exploded'][0];

        # get the recursive search of key
        $recursive = substr($path, strlen($file_name) + 1);

        # get the message content
        $content = $templates[$recursive];

        if (count($params)) {
            foreach ($params as $key => $val) {
                $content = str_replace('{'.$key.'}' , $val, $content);
            }
        }

        return $content;
    }
}