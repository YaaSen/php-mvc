<?php

class Controller {

    # Constructor method
    public function __construct() {

    }

    # View method
    public function view($file_path, $data = array()) {
        # Checks if data is not empty,
        # if true extract array data
        if (count($data) > 0) {
            extract($data);
        }

        # Checks if file does exists, if true, require file
        if (file_exists('./application/views/' . $file_path . '.php')) {
            require_once './application/views/' . $file_path . '.php';
        }
    }

    # Model method
    public function model($model_name) {
        # Create new instance for the model
        return new $model_name();
    }

}