<?php

if(!function_exists('view')) {
    /**
     * Includes a view file based on the provided relative path.
     *
     * This function constructs the full file path to a view based on the provided
     * relative path and includes the view file. If the path is empty or not provided, it throws an exception.
     *
     * @param string $path The relative path to the view file, without the '.php' extension.
     * 
     * @return void
     * 
     * @throws \InvalidArgumentException If the provided path is empty.
     */
    function view(string $path, ?array $params = []): void {
        if(!$path || empty($path)) throw "Can not return a view based on an empty path";
        
        $viewsPath = realpath(__DIR__ .'/../views') .'/';

        foreach($params as $key => $val) {
            $$key = $val;
        }

        include_once($viewsPath . $path .'.php');
    }
}