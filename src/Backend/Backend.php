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

    public function getDefaultFile() {
        global $config;
        if (isset($config['backend']['frontpage'])) {
            return $config['backend']['frontpage'];
        } else {
            return "README";
        }
    }

    public function getFileContents($filename) {
        return file_get_contents($this->getDirectory().DIRECTORY_SEPARATOR.$filename);
    }

    static function createBackend($backendDefs) {
        return new self::$backendmap[$backendDefs['type']]($backendDefs);
    }


}