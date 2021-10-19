<?php

class Controller {

    # Constructor method
    public function __construct() {

    }

    public function view($file_path, $data = array()) {
        # Checks if data is not empty, if true
        # conver array as individual variable
        if (count($data) > 0) {
            foreach ($data as $_key => $_value) {
                $$_key = $_value;
            }
        }
        # Checks if file does exists, if true, require file
        if (file_exists('./application/views/' . $file_path . '.php')) {
            require_once './application/views/' . $file_path . '.php';
        }
    }

}