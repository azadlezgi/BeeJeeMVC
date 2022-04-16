<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Users;

class AccountController extends Controller
{
    public function loginAction() {
        $data = [];
        $usersModel = new Users();

        if (isset($_SESSION['admin'])) {
            $this->view->redirect('/task/index');
        }
        if (!empty($_POST)) {
            if (!$usersModel->loginValidate($_POST)) {
                $data['error'] = $this->view->message('error', $usersModel->error);
            } else {
                $_SESSION['admin'] = true;
                $this->view->redirect('/task/index');
            }
        }
        $this->view->render(
            'Авторизация',
            $data
        );
    }

    public function logoutAction() {
        unset($_SESSION['admin']);
        $this->view->redirect('/account/login');
    }
}