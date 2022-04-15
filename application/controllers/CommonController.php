<?php

namespace application\controllers;

use application\core\Controller;

class CommonController extends Controller
{

    public function indexAction() {
        $this->view->patch = "common/index";
        $this->view->render(
            'Home title'
        );
    }
}