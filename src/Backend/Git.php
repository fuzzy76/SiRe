<?php

namespace Sire\Backend;
use GitElephant\Repository;

class Git extends Backend {

    public  $repo;

    public function __construct($backenddefs)
    {
        parent::__construct($backenddefs);
        $this->repo = new Repository($this->getDirectory());
        // If the directory doesn't exist, we need to clone the repo
        if (!is_dir($this->getDirectory())) {
            $this->repo->init();
            $this->repo->cloneFrom($backenddefs['repo']);
        }
    }
}