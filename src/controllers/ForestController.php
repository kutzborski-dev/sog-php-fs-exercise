<?php

namespace App\Controllers;

class ForestController extends Controller {
    public function __construct()
    {
        // Use the constructor to set query parameters in the controller class
        parent::__construct();
    }

    public function index() {
        $forestName = $this->params['name'] ?? null;
        if(!$forestName) throw 'A forest name is required for this route';
        
        return view('forest/single', [
            'forestName' => $forestName
        ]);
    }

    public function render() {
        // Handle which function should be returned based on query parameters
        return $this->index();
    }
}