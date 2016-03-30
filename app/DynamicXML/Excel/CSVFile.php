<?php

namespace DynamicXML\Excel;

class CSVFile {

    /**
     *
     * @var string
     */
    protected $orderNumber;

    /**
     *
     * @var array
     */
    protected $list;

    /**
     *
     * @var array
     */
    protected $csvRows = array();

    /**
     * 
     * @param array $csvRow
     */
    public function addCSVRow($csvRow) {
        array_push($this->csvRows, $csvRow);
    }

    public function convertCSVRowsToList() {
        
    }

    /**
     * Save the CSV file to the "processed" directory.
     *
     */
    public function save() {
        $file = fopen("../app/processed" . $this->orderNumber . "-" . date("F j, Y") . ".csv", "w");
        foreach ($this->list as $line) {
            fputcsv($file, explode(',', $line));
        }
        fclose($file);
    }

    // Getters

    public function getOrderNumber() {
        return $this->orderNumber;
    }

    public function getList() {
        return $this->list;
    }

    // Setters

    public function setOrderNumber($orderNumber) {
        $this->orderNumber = $orderNumber;
    }

    public function setList($list) {
        $this->list = $list;
    }

}
