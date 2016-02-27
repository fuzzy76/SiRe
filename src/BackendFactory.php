<?php

namespace Sire;

class BackendFactory {
    public static $backendmap = array(
      'git' => 'Sire\Backend\Git'
    );
    static function createBackend($name, $backendDefs) {
        return new self::$backendmap[$backendDefs['type']]($name, $backendDefs);
    }

}