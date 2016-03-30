<?php

namespace DynamicXML\Files;

use DynamicXML\Files\File;

class ZIPFile extends File {

    protected $xmlFiles = array();

    public function __construct($file) {
        parent::__construct($file);
    }

}
