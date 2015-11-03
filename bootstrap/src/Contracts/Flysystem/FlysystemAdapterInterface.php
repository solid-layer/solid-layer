<?php
namespace Bootstrap\Contracts\Flysystem;

interface FlysystemAdapterInterface
{
    public function client();
    public function adapter();
}
