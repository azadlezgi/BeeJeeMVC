<?php

namespace application\core;

class Router
{

    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $routes_arr = require 'application/config/routes.php';
        foreach ($routes_arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    public function add($route, $params) {
        $route = '#^'. $route .'$#';
        $this->routes[$route] = $params;
    }

    public function match() {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }


    public function run() {

        if ($this->match()) {
            $controller_patch = 'application\controllers\\'. ucfirst($this->params['controller']) .'Controller';
            if (class_exists($controller_patch)) {
                $action = $this->params['action'] .'Action';
                if (method_exists($controller_patch, $action)) {
                    $controller = new $controller_patch($this->params);
                    $controller->$action();
                } else {
                    echo "Method <b>". $action ."</b> not found";
                }
            } else {
                echo "Class <b>". $controller_patch ."</b> not found";
            }
        } else {
            echo "404 Page";
        }
    }

}