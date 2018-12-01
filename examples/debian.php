<?php

// Autochargement des classes
set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__.'/../lib/');
spl_autoload_extensions('.class.php');
spl_autoload_register();

// Definition du repertoire de cache
define('CACHE_DIR', __DIR__.'/../cache'.substr(__FILE__, strlen(__DIR__), -4));
if(!is_dir(__DIR__.'/../cache')) mkdir(__DIR__.'/../cache');


# deb http://ftp.ch.debian.org/debian/ stretch main non-free contrib
# deb http://127.0.0.1/debian/ stretch main non-free contrib

$repo = new APT\Repo('http://ftp.ch.debian.org/debian/', CACHE_DIR);
$repo->addMirror('http://127.0.0.1/debian/');
$repo->addDistrib('stretch', 'stable', 'Debian9.6');
$repo->addComponent('main', 'non-free', 'contrib');

var_dump($repo);
