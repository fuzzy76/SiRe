<?php

namespace Sire\Backend;
use GitElephant\Repository;

class Git extends Backend {

    public  $repo;

    public function __construct($name, $backenddefs)
    {
        parent::__construct($name, $backenddefs);
        $this->repo = new Repository($this->getDirectory());
    }

}