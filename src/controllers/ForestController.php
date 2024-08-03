<?php

namespace App\Controllers;

class ForestController extends Controller {
    public function __construct()
    {
        // Use the constructor to set query parameters in the controller class
        parent::__construct();
    }

    public function index() {
        return view('forest/list');
    }

    public function single($forestName) {
        return view('forest/single', [
            'forestName' => $forestName
        ]);
    }

    public function render() {
        // Handle which function should be returned based on query parameters

        if(array_key_exists('name', $this->params)) {
            return $this->single($this->params['name']);
        }

        return $this->index();
    }
}