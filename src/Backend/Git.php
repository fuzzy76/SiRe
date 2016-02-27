<?php

namespace Sire\Backend;
use GitElephant\Repository;

class Git extends BackendBase {

    public  $repo;

    public function __construct($name, $backenddefs)
    {
        parent::__construct($name, $backenddefs);
        $this->repo = new Repository($this->getDirectory());
    }

}