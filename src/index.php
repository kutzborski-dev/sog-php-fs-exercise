<?php

    // Handle very simple and basic routing
    $page = $_GET['page'] ?? 'home';

    $pageController = 'App\\Controllers\\'. ucfirst($page) .'Controller'::class;

    if(class_exists($pageController)) {
        $pageController = new $pageController;
        $pageController->render();
    }