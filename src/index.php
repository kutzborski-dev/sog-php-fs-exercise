<?php
    use App\Core\Handlers\RouteHandler;
    use App\Core\Database;

    // Handle very simple and basic routing
    Database::init();
    RouteHandler::init();