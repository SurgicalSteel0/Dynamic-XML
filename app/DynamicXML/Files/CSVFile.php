<?php

namespace DynamicXML\Files;

class CSVFile extends File {

    public $orderNumber;

    public function __construct($file) {
        parent::__construct($file);
        $this->parseOrderNumber();
    }

    private function parseOrderNumber() {
        $namePieces = explode('-', $this->basename);
        $this->orderNumber = $namePieces[0];
    }

}
