<?php

namespace Sire\Filetype;
use League\CommonMark\CommonMarkConverter;

class Markdown extends File {

    public function __construct($name, $backend)
    {
        parent::__construct($name, $backend);
    }

    public function render() {
        $converter = new CommonMarkConverter();
        $contents = $this->backend->getFileContents($this->name);
        return $converter->convertToHtml($contents);
    }


}