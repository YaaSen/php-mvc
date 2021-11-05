<?php

class Model {

    public $db;

    # Constructor method
    public function __construct($db) {
        $this->db = $db;
    }

}