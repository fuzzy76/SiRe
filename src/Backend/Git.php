<?php

namespace Sire\Backend;
use GitElephant\Repository;

class Git extends Backend {

    public  $repo;

    public function __construct($backenddefs) {
        parent::__construct($backenddefs);
        // If the directory doesn't exist, we need to clone the repo
        if (!is_dir($this->getDirectory())) {
            mkdir($this->getDirectory(), 0777, TRUE);
            $this->repo = new Repository($this->getDirectory());
            $this->repo->cloneFrom($backenddefs['repo'], $this->getDirectory());
            $this->repo->checkoutAllRemoteBranches();
        } else {
            $this->repo = new Repository($this->getDirectory());
        }
    }

    public function update() {
        $this->repo->pull();
        return 200;
    }
}