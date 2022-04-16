<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Task;

class CommonController extends Controller
{
    public function indexAction() {

        $taskModel = new Task();
        $query = $taskModel->taskList();

        debug( $query );

        $this->view->patch = "common/index";
        $this->view->render(
            'Home title',
        );
    }
}