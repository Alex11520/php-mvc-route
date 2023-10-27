<?php
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
require __DIR__ . '/../../vendor/autoload.php';

$file = __DIR__.'/../../logs/log';

if(!is_file($file)){
    touch($file);     // Save our content to the file.
}
// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler($file, Level::Warning));

// add records to the log
$log->warning('Foo');
$log->error('Bar');