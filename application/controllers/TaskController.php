<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Task;

class TaskController extends Controller
{

    public function addAction() {

        $taskModel = new Task();

        $data['username'] = "";
        $data['email'] = "";
        $data['description'] = "";

        if (!empty($_POST)) {
            $data['username'] = stripinput($_POST['username']);
            $data['email'] = stripinput($_POST['email']);
            $data['description'] = stripinput($_POST['description']);

            if (!$taskModel->taskValidate($_POST, 'add')) {
                $data['error'] = $this->view->message('error', $taskModel->error);
            } else {
                $task_id = $taskModel->taskAdd($_POST);
                if ($task_id) {

                    $data['username'] = "";
                    $data['email'] = "";
                    $data['description'] = "";

                    $data['success'] = $this->view->message('success', 'Задача успешно добавлен');
                } else {
                    $data['error'] = $this->view->message('error', 'Ошибка обработки запроса');
                }
            }
        } // if

        $this->view->patch = "task/add";
        $this->view->render(
            'Страница добавление задачи',
            $data
        );
    }

}