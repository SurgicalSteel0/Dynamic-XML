<?php

namespace DynamicXML\Sessions;

/**
 * Description of Session
 *
 * @author drpriebe
 */
class Session {

    public function __construct() {
        session_name('dynamic_xml');
        session_start();
    }

    /**
     *
     * @param string $name
     * @param type $object
     */
    public function register($name, $object) {
        $_SESSION[((string) $name)] = serialize($object);
    }

    /**
     * 
     * @param string $name
     */
    public function destroy($name) {
        unset($_SESSION[$name]);
    }

    /**
     *
     * @param type $name
     * @return type
     */
    public function get($name) {
        return isset($_SESSION[$name]) ? unserialize($_SESSION[$name]) : false;
    }

}
