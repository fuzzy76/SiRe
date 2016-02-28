<?php

namespace Sire;
use Sire\Backend\Backend;
use Sire\Filetype\File;

class Router {

    static $errors = array(
        200 => "200 Ok",
        403 => "403 Access denied",
        404 => "404 Page not found"
    );
    function __construct()
    {
    }

    function getPath() {
        return ltrim($_SERVER["REQUEST_URI"], '/');
    }

    function process() {
        global $config;
        $backend = Backend::createBackend($config['backend']);
        $file = File::createFile($backend, $this->getPath());
        if ($file instanceof File) {
            $templates = new \League\Plates\Engine('template');
            echo $templates->render('content', ['file' => $file]);
        } else if ($file == 200) {
            // Asset fallback
            $backend->serveRaw($this->getPath());
        } else {
            // Error handling
            header(self::$errors[$file]);
            echo self::$errors[$file];
        }


    }
}