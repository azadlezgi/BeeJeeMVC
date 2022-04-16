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

    public function render($title, $data = []) {
        extract($data);
        $path = "application/views/". $this->patch .".php";
        if (file_exists($path)) {
            ob_start();
            require $path;
            $content = ob_get_clean();
            require "application/views/layouts/". $this->layout .".php";
        } else {
            echo "View <b>". $this->patch ."</b> not found";
        }
    }

    public function message($status, $message) {
        return ['status' => $status, 'message' => $message];
    }

    public function redirect($url) {
        header('location: '. $url);
        exit;
    }

    static function errorCode($code, $errorMessage) {
        http_response_code($code);
        $path = "application/views/errors/". $code .".php";
        if (file_exists($path)) {
            require $path;
        } else {
            require "application/views/errors/403.php";
        }
        exit;
    }


}