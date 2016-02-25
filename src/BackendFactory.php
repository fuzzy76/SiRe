<?php

namespace SiRe;

class BackendFactory {
    public static $backendmap = array(
      'git' => 'SiRe\Backend\Git'
    );
    static function createBackend($name, $backendDefs) {
        return new self::$backendmap[$backendDefs['type']]($name, $backendDefs);
    }

}