<?php

namespace Sire;
use League\CommonMark\CommonMarkConverter;

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
        $converter = new CommonMarkConverter();
        return $converter->convertToHtml($this->contents);
    }
}