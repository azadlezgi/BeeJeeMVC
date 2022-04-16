<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Task;
use application\lib\Pagination;
use DateTime;

class CommonController extends Controller
{
    public function indexAction() {


        $pagination_route = [
            'controller' => 'task',
            'action' => 'index'
        ];

        $taskModel = new Task();
        $pagination = new Pagination($pagination_route, $taskModel->taskCount());

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
                    'date' => $date_format
                ];
            } // foreach
        } // if

        $this->view->patch = "common/index";
        $this->view->render(
            'Главная страница',
            $data
        );
    }
}