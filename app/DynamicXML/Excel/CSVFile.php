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
    protected $list = array("Name, Street, State");

    /**
     *
     * @var array
     */
    protected $csvRows = array();

    public function clearCSVRows() {
        unset($this->csvRows);
        $this->csvRows = array();
    }

    /**
     * 
     * @param array $csvRow
     */
    public function addCSVRow($csvRow) {
        array_push($this->csvRows, $csvRow);
    }

    public function convertCSVRowsToList() {
        foreach ($this->csvRows as $csvRow) {
            array_push($this->list, "{$csvRow['name']}, {$csvRow['street']}, {$csvRow['state']}");
        }
    }

    /**
     * Save the CSV file to the "processed" directory.
     *
     */
    public function save() {
        $file = fopen("../../app/processed/" . $this->orderNumber . "-" . date("F j, Y") . ".csv", "w");
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

    public function getCSVRows() {
        return $this->csvRows;
    }

    // Setters

    public function setOrderNumber($orderNumber) {
        $this->orderNumber = $orderNumber;
    }

    public function setList($list) {
        $this->list = $list;
    }

    public function setCSVRows($csvRows) {
        $this->csvRows = $csvRows;
    }
    
}
