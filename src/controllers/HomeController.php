<?php

namespace App\Controllers;

use App\Repositories\ForestRepository;

class HomeController {
    public function __construct()
    {
        // Use the constructor to set query parameters in the controller class
    }

    public function index() {
        $forests = ForestRepository::getAll();

        return view('home', [
            'forests' => $forests
        ]);
    }

    public function render() {
        // Echo view or html
        return $this->index();
    }
}