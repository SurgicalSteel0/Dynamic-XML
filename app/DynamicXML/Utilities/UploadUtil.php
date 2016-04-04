<?php

namespace DynamicXML\Utilities;

class UploadUtil {

    private $maxFileSize = 5000000;
    private $allowedTypes = array();
    private $uniqueId = "";
    private $dir;
    public $uploadedFile;
    public $successful = false;
    public $errors = array();

    public function setMaxFileSize($bytes) {
        $this->maxFileSize = (int) $bytes;
    }

    public function setAllowedTypes($allowedTypes = array()) {
        array_push($this->allowedTypes, $allowedTypes);
    }

    public function setUniqueId($uniqueId) {
        $this->uniqueId = (string) $uniqueId;
    }

    public function setDirectory($dir) {
        $this->dir = (string) $dir;
    }

    /**
     * 
     * 
     * @param FileObject $file
     */
    public function upload($file) {

        $targetFile = $this->dir . '/' . $this->uniqueId . basename($file['name']);
        $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);

        // Check file format
        if (!in_array($fileType, $this->allowedTypes)) {
            array_push($this->errors, "Please make sure you are uploading a zip file (.zip).");
        }

        // Check file size
        if ($file['size'] > $this->maxFileSize) {
            array_push($this->errors, "Your file is too big to be uploaded.");
        }

        // Try to upload
        if (count($this->errors) === 0) {
            $this->successful = move_uploaded_file($file['tmp_name'], $targetFile);
            if (!$this->successful) {
                array_push($this->errors, "Please make sure your file is not open in any other program and try your upload again.");
            }
            $this->uploadedFile = $this->successful ? $targetFile : '';
        }
    }

}
