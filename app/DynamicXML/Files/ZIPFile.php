<?php

namespace DynamicXML\Files;

use DynamicXML\Files\File;
use DynamicXML\Utilities\DirectoryUtil;

class ZIPFile extends File {

    public $numberOfXMLs;

    public function __construct($file) {
        parent::__construct($file);
        $this->calculateNumberOfXMLs();
    }

    private function calculateNumberOfXMLs() {
        $xmlFiles = DirectoryUtil::getAllFilesInDirectory("../app/extracted/" . $this->basename);
        $this->numberOfXMLs = count($xmlFiles);
    }

}
