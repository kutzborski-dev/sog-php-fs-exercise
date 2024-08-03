<?php

namespace App\Controllers;

class Controller {
    protected array $params = [];

    public function __construct()
    {
        $params = $_GET;
        if(isset($params['page'])) {
            unset($params['page']);
        }

        $this->params = $params;
    }
}