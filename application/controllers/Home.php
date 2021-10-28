<?php

# Home Controller Class
class Home extends Controller {

    # Page data
    public $page_data;

    # Constructor method
    public function __construct() {
        # Parent constructor
        parent::__construct();
    }

    # Index method
    public function index() {
        echo '<h3>This is the home page.</h3>';
    }

}