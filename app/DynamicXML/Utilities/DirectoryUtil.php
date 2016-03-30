<?php

namespace DynamicXML\Utilities;

class DirectoryUtil {

    /**
     * Returns all files in the given directory.
     *
     * @param type $directory
     * @return array
     */
    public static function getAllFilesInDirectory($directory) {

        $files = array();

        if (is_dir($directory)) {
            if ($directoryHandle = opendir($directory)) {
                while ((($file = readdir($directoryHandle)) !== false)) {
                    if (!in_array($file, array(".", ".."))) {
                        array_push($files, $file);
                    }
                }
                closedir($directoryHandle);
            }
        }

        return $files;
    }

    /**
     * Creates the given directory.
     *
     * @param type $directory
     * @return boolean
     */
    public static function createDirectory($directory) {
        return mkdir($directory);
    }

    /**
     * Deletes a directory and its contents.
     * 
     * @param string $directory
     */
    public static function deleteDirectory($directory) {
        foreach (glob($directory . '/*') as $file) {
            if (is_dir($file)) {
                rrmdir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($directory);
    }

}
