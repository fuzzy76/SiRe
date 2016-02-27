<?php

namespace Sire\Backend;
use Sire\File;

class BackendBase {

    public $name = '';
    public $backenddefs = array();

    public function __construct($name, $backenddefs)
    {
        $this->name = $name;
        $this->backenddefs = $backenddefs;
    }

    public function getDirectory() {
        return 'data/backends/'.DIRECTORY_SEPARATOR.$this->name;
    }

    public function getFile($file) {
        $contents = file_get_contents($this->getDirectory().DIRECTORY_SEPARATOR.$file);
        return new File($file,  $contents);
    }


}