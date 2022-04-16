<?php

namespace application\models;

use application\core\Model;

class Task extends Model {
    public function taskList()
    {

        return $this->db->row('SELECT * FROM task');

    }
}
