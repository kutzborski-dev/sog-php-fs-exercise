<?php

namespace App\Core\Handlers;

class RouteHandler {
    public static function init() {
        $page = $_GET['page'] ?? 'home';

        $pageController = 'App\\Controllers\\'. ucfirst($page) .'Controller'::class;

        if(class_exists($pageController)) {
            $pageController = new $pageController;
            echo $pageController->render();
        }
    }
}