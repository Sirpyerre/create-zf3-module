#!/usr/bin/env php

<?php
require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Console\CreateModuleCommand;

$app = new Application('Create module struct', 'v0.0.1');
$app->add(new CreateModuleCommand());
$app->run();