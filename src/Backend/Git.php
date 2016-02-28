<?php

namespace Sire\Backend;
use GitElephant\Repository;

class Git extends Backend {

    public  $repo;

    public function __construct($backenddefs)
    {
        parent::__construct($backenddefs);
        $this->repo = new Repository($this->getDirectory());
    }

}