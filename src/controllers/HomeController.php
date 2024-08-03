<?php

namespace App\Controllers;

class HomeController {
    public function __construct()
    {
        // Use the constructor to set query parameters in the controller class
    }

    public function index() {
        return view('home');
    }

    public function render() {
        // Echo view or html
        return $this->index();
    }
}