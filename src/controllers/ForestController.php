<?php

namespace App\Controllers;

class ForestController extends Controller {
    public function __construct()
    {
        // Use the constructor to set query parameters in the controller class
        parent::__construct();
    }

    public function index() {
        return 'Forest list rendered';
    }

    public function single($forestName) {
        return 'Forest "'. $forestName .'" rendered';
    }

    public function render() {
        // Handle which function should be returned based on query parameters
        
        if(array_key_exists('name', $this->params)) {
            return $this->single($this->params['name']);
        }

        return $this->index();
    }
}