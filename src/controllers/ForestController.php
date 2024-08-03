<?php

namespace App\Controllers;

use App\Repositories\ForestRepository;
use App\Repositories\ForestFireRepository;

class ForestController extends Controller {
    public function __construct()
    {
        // Use the constructor to set query parameters in the controller class
        parent::__construct();
    }

    public function index() {
        $forestName = $this->params['forest'] ?? null;
        if(!$forestName) throw new \Exception('A forest name is required for this route');

        $forest = ForestRepository::getBySlug($forestName);
        $fires = ForestFireRepository::getByForestSlug($forestName);

        $forest->setFires($fires);
        
        return view('forest/single', [
            'forest' => $forest
        ]);
    }

    public function render() {
        // Handle which function should be returned based on query parameters
        return $this->index();
    }
}