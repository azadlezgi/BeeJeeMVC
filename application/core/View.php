<?php

namespace application\core;

class View
{

    public $patch;
    public $route;
    public $layout = 'default';

    public function __construct($route)
    {
        $this->route = $route;
        $this->patch = $route['controller'] ."/". $route['action'];
    }

    public function render($title, $params = []) {
        if (file_exists("application/views/". $this->patch .".php")) {
            ob_start();
            require "application/views/" . $this->patch . ".php";
            $content = ob_get_clean();
            require "application/views/layouts/". $this->layout .".php";
        } else {
            echo "View <b>". $this->patch ."</b> not found";
        }
    }

}