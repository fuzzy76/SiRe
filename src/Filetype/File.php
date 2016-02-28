<?php

namespace Sire\Filetype;

class File {
    public $name = '';
    public $backend;
    public static $extmap = array(
        'md' => 'Sire\Filetype\Markdown'
    );
    public function __construct($name, $backend) {
        $this->name = $name;
        $this->backend = $backend;
    }

    static function parseExtension($name) {
        return pathinfo($name, PATHINFO_EXTENSION);
    }

    public function getExtension() {
        return self::getExtension($this->name);
    }

     static function createFile($backend, $name) {
         if (!$name) {
             $name = $backend->getDefaultFile();
         }
         if ($backend->isDirectory($name)) {
             $name = $name . DIRECTORY_SEPARATOR . $backend->getDefaultFile();
         }
         $status = $backend->checkFile($name);
         if ($status == 200) {
             $ext = self::parseExtension($name);
             if ($ext) {
                 $type = ( isset(self::$extmap[$ext]) ? self::$extmap[$ext] : NULL);
                 if ($type) {
                     return new $type($name, $backend);
                 }
             }
         }
         return $status;
    }
}