<?php

namespace Components\Flysystem;

interface FlysystemAdapterInterface
{
    public function client();
    public function adapter();
}