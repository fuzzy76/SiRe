<?php

namespace Sire\Backend;
use Sire\Filetype\File;

class Backend {

    public $name = '';
    public $backenddefs = array();
    public static $backendmap = array(
        'git' => 'Sire\Backend\Git'
    );

    public function __construct($name, $backenddefs)
    {
        $this->name = $name;
        $this->backenddefs = $backenddefs;
    }

    public function getDirectory() {
        return 'data/backend';
    }


    public function getFileContents($filename) {
        return file_get_contents($this->getDirectory().DIRECTORY_SEPARATOR.$filename);
    }

    static function createBackend($name, $backendDefs) {
        return new self::$backendmap[$backendDefs['type']]($name, $backendDefs);
    }


}