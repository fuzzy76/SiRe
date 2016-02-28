<?php

namespace Sire;
use Sire\Backend\Backend;
use Sire\Filetype\File;

class Router {
    function __construct()
    {
    }

    function getPath() {
        return ltrim($_SERVER["REQUEST_URI"], '/');
    }

    function process() {
        global $config;
        // TODO use array key for name, loop/pop/whatever (get all backends)
        $backend = Backend::createBackend($config['backend']);
        $file = File::createFile($backend, $this->getPath());
        $templates = new \League\Plates\Engine('template');
        echo $templates->render('content', ['file' => $file]);

    }
}