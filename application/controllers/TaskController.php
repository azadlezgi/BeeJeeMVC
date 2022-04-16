<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;
use application\models\Task;
use DateTime;

class TaskController extends Controller
{
    public function indexAction() {

        $taskModel = new Task();
        $pagination = new Pagination($this->route, $taskModel->taskCount());

        $data['pagination'] = $pagination->get();

        $query = $taskModel->taskList($this->route);
        $data['tastList'] = [];
        if ($query) {
            foreach ($query as $row) {


                $short_name = preg_replace('/(.)[^\s]+\s?/', '${1}.', strtoupper($row['username']));
                $short_name = str_replace(".", "", $short_name);
                $short_name = substr((strlen($short_name) < 2 ? strtoupper($row['username']) : $short_name), 0, 2);

                $date_format = new DateTime($row['date_added']);
                $date_format = $date_format->format("d.m.Y");

                $data['tastList'][] = [
                    'id' => $row['task_id'],
                    'username' => $row['username'],
                    'short_name' => $short_name,
                    'email' => $row['email'],
                    'description' => $row['description'],
                    'status' => $row['status'],
                    'date' => $date_format
                ];
            } // foreach
        } // if

        $this->view->render(
            'Страница список задачи',
            $data
        );
    }

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

        $this->view->render(
            'Страница добавление задачи',
            $data
        );
    }

    public function editAction() {

        if (!isset($_SESSION['admin'])) {
            $this->view->redirect('/account/login');
        } else {

            if (!isset($this->route['id'])) {
                $this->view->redirect('/task/index');
            }

            $taskModel = new Task();


            if (!empty($_POST)) {
                $data['username'] = stripinput($_POST['username']);
                $data['email'] = stripinput($_POST['email']);
                $data['description'] = stripinput($_POST['description']);

                if (!$taskModel->taskValidate($_POST, 'add')) {
                    $data['error'] = $this->view->message('error', $taskModel->error);
                } else {
                    $task_id = $taskModel->postEdit($_POST, $this->route['id']);
                    if ($task_id) {
                        $data['success'] = $this->view->message('success', 'Задача успешно отредактирована');
                    } else {
                        $data['error'] = $this->view->message('error', 'Ошибка обработки запроса');
                    }
                }
            } // if


            $query = $taskModel->taskData($this->route['id']);
            if (!$query) {
                $this->view->redirect('/task/index');
            }

            $data['id'] = $this->route['id'];
            $data['username'] = $query[0]['username'];
            $data['email'] = $query[0]['email'];
            $data['description'] = $query[0]['description'];
            $data['status'] = $query[0]['status'];

            $this->view->render(
                'Страница редактирование задачи',
                $data
            );
        } // if session true
    }

}