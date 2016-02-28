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
        $fullpath = $this->getDirectory().DIRECTORY_SEPARATOR.$name;

        $realfullpath = realpath($fullpath);
        $realdirpath = realpath($this->getDirectory());
        if (substr($realfullpath, 0, strlen($realdirpath)) === $realdirpath) {
            // If the resulting file is inside the backend directory...
            return $fullpath;
        }
        // Just return the index file. Might do an exception instead.
        return $this->getFullPath($this->getDefaultFile());
    }

    public function getDefaultFile() {
        global $config;
        if (isset($config['backend']['indexpage'])) {
            return $config['backend']['indexpage'];
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