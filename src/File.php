<?php

namespace SiRe;

class File {
    public $name;
    public $contents;
    public function __construct($name, $contents) {
        $this->name = $name;
        $this->contents = $contents;
    }

    public function getExtension() {
        return pathinfo($this->name, PATHINFO_EXTENSION);
    }

    public function render() {
        return "<pre>{$this->contents}</pre>";
    }
}