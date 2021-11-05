<?php

# Home Controller Class
class Home extends Controller {

    # Page data
    public $data = array();

    # Constructor method
    public function __construct() {
        # Parent constructor
        parent::__construct();
    }

    # Index method
    public function index() {
        # Page data
        $this->data['page_title'] = 'Home';

        # Page views
        $this->view('templates/header', $this->data);
        $this->view('index', $this->data);
        $this->view('templates/footer');
    }

}