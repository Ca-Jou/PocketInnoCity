<?php
const DEFAULT_APP = 'Mainstage';

if (!isset($_GET['app']) || !file_exists(__DIR__.'/../App/'.$_GET['app']))
{
    $_GET['app'] = DEFAULT_APP;
}

// autoloads
require __DIR__ . '/../lib/Framework/SplClassLoader.php';

$FrameworkLoader = new SplClassLoader('Framework',__DIR__.'/../lib');
$FrameworkLoader->register();

$appLoader = new SplClassLoader('App', __DIR__.'/..');
$appLoader->register();

$modelLoader = new SplClassLoader('Model', __DIR__.'/../lib/vendors');
$modelLoader->register();

$entityLoader = new SplClassLoader('Entity', __DIR__.'/../lib/vendors');
$entityLoader->register();

$formBuilderLoader = new SplClassLoader('FormBuilder', __DIR__.'/../lib/vendors');
$formBuilderLoader->register();

// run the correct app
$appClass = 'App\\'.$_GET['app'].'\\'.$_GET['app'].'Application';
$app = new $appClass;
$app->run();
