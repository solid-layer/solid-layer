<?php

namespace App\Providers\Slayer;

/**
 * We will be over-riding the 'flash' as we will be mapping on
 * using the flashSession
 */
class Flash extends FlashSession
{
  protected $_alias = 'flash';
}