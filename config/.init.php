<?php

return [

    # - add your config below to access your config,
    # you may call config()->{file}->{key}


    # ------------------------------------------------------------
    # PhalconSlayer Files
    # ------------------------------------------------------------
    # - Do not edit below, if you don't know what you're
    # doing, instead add your own dependecies
    'acl'      => require_once __DIR__ . '/acl.php',
    'app'      => require_once __DIR__ . '/app.php',
    'aws'      => require_once __DIR__ . '/aws.php',
    'consoles' => require_once __DIR__ . '/consoles.php',
    'database' => require_once __DIR__ . '/database.php',
    'inliner'  => require_once __DIR__ . '/inliner.php',
    'mailer'   => require_once __DIR__ . '/mailer.php',
    'modules'  => require_once __DIR__ . '/modules.php',
    'path'     => require_once __DIR__ . '/path.php',


]; # - end of return