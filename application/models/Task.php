<?php

namespace application\models;

use application\core\Model;

class Task extends Model {

    public $error;

    public function taskList($route)
    {
        $max = 10;
        $params = [
            'max' => $max,
            'start' => (((isset($route['page']) ? $route['page'] : 1) - 1) * $max),
        ];
        return $this->db->row('SELECT * FROM task ORDER BY task_id DESC LIMIT :start, :max', $params);

    }

    public function taskCount() {
        return $this->db->column('SELECT COUNT(task_id) FROM task');
    }

    public function taskValidate($post, $type) {
        $usernameLen = iconv_strlen($post['username']);
        $descriptionLen = iconv_strlen($post['description']);
        $emailLen = iconv_strlen($post['email']);
        $email = stripinput($post['email']);
        if ($usernameLen < 3 or $usernameLen > 100) {
            $this->error = 'Имя пользователя должно содержать от 3 до 100 символов.';
            return false;
        } elseif ($emailLen < 3 or $emailLen > 255) {
            $this->error = 'E-mail должнен содержать от 10 до 255 символов.';
            return false;
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error = 'E-mail адрес '. $email .' указан не верно.';
            return false;
        } elseif ($descriptionLen < 3 or $descriptionLen > 5000) {
            $this->error = 'Описание должно содержать от 3 до 5000 символов.';
            return false;
        }
        return true;
    }

    public function taskAdd($post) {
        $params = [
            'username' => stripinput($post['username']),
            'email' => stripinput($post['email']),
            'description' => stripinput($post['description']),
            'status' => 0,
        ];
        $this->db->query('INSERT INTO task (username, email, description, status) VALUES (:username, :email, :description, :status)', $params);
        return $this->db->lastInsertId();
    }
}
