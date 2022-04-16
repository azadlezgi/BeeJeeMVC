<?php

namespace application\models;

use application\core\Model;

class Users extends Model {

    public $error;

    public function loginValidate($post) {
        $config = require 'application/config/admin.php';
        if ($config['login'] != stripinput($post['login']) or $config['password'] != stripinput($post['password'])) {
            $this->error = 'Логин или пароль указан неверно';
            return false;
        }
        return true;
    }
}
