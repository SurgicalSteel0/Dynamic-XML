<?php

namespace DynamicXML\Files;

class File {

    /**
     * The name of the file with the extension.
     *
     * @var string
     */
    public $name;

    /**
     * The name if the file without the extension.
     * 
     * @var string
     */
    public $basename;

    /**
     * The directory the file is located in.
     *
     * @var string
     */
    public $directory;

    /**
     * The size of the file in bytes.
     *
     * @var int
     */
    public $size;

    /**
     * The extension fo the file.
     *
     * @var string
     */
    public $extension;

    /**
     *
     *
     * @param string $file
     */
    public function __construct($file) {

        $pathParts = pathinfo($file);
        $this->name = $pathParts["basename"];
        $this->basename = $pathParts["filename"];
        $this->directory = $pathParts["dirname"];
        $this->extension = $pathParts["extension"];

        $this->calculateSize();
    }

    /**
     * Representation of the file as a string.
     * 
     * @return string
     */
    public function __toString() {
        return $this->name;
    }

    /**
     * Calculate the size of the file.
     *
     */
    private function calculateSize() {
        $this->size = filesize($this->directory . "/" . $this->name);
    }

}
