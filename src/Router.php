<?php

namespace SiRe;

class Router {
    function __construct()
    {
    }

    function getPath() {
        return ltrim($_SERVER["REQUEST_URI"], '/');
    }

    function process($backend) {
        return $backend->getFile($this->getPath());
    }
}