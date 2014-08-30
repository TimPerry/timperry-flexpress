<?php

use TimPerry\Theme\DependencyInjection\DependencyInjectionContainer;

// Dependency Injection
$dic = new DependencyInjectionContainer();
$dic->init();

// Run app
$dic['TimPerry']->init(__DIR__);
