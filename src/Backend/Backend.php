<?php

namespace Sire\Backend;
use Sire\Filetype\File;

class Backend {

    public $backenddefs = array();
    public static $backendmap = array(
        'git' => 'Sire\Backend\Git'
    );

    public function __construct($backenddefs)
    {
        $this->backenddefs = $backenddefs;
    }

    public function getDirectory() {
        return 'data/backend';
    }

    public function getFullPath($name) {
        return $this->getDirectory().DIRECTORY_SEPARATOR.$name;
    }

    public function getDefaultFile() {
        global $config;
        if (isset($config['backend']['frontpage'])) {
            return $config['backend']['frontpage'];
        } else {
            return "README";
        }
    }

    public function checkFile($filename) {
        $filename = $this->getFullPath($filename);
        if (!file_exists($filename))
            return 404; // File not found
        if (!is_readable($filename))
            return 403; // Access denied
        return 200;
    }

    public function isDirectory($name) {
        return is_dir($name);
    }

    public function getFileContents($filename) {
        return file_get_contents($this->getFullPath($filename));
    }

    public function serveRaw($name) {
        $filename = $this->getFullPath($name);
        header('Content-Type: ' . mime_content_type($filename));
        header('Content-Length: ' . filesize($filename));
        readfile($filename);
    }

    static function createBackend($backendDefs) {
        return new self::$backendmap[$backendDefs['type']]($backendDefs);
    }


}