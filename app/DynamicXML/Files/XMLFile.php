<?php

namespace DynamicXML\Files;

use DynamicXML\Files\File;

class XMLFile extends File {

    public $content;

    public function __construct($file) {
        parent::__construct($file);
        $this->loadXMLContent($file);
    }

    private function loadXMLContent($file) {
        $this->content = simplexml_load_file($file);
    }

}
