<?php

class CRUD_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getTeacherInfo($teacher)
    {
        $teacher_info = $this->db->get_where('teachers', array('teacher' => $teacher));
        return $teacher_info->result_array();
    }

    public function getAccessedSubj($teacher)
    {
        $query = $this->db->select('name, subject')
            ->where('accessed_subj.teacher', $teacher)
            ->join('subjects', 'accessed_subj.subject = subjects.id')
            ->get('accessed_subj');
        $result = array();
        foreach ($query->result_array() as $item) {
            $result += array($item['subject'] => $item['name']);
        }
        return $result;
    }

    public function getAccessedClasses($teacher)
    {
        $query = $this->db->select('name, class')
            ->where('accessed_classes.teacher', $teacher)
            ->join('classes', 'accessed_classes.class = classes.id')
            ->get('accessed_classes');
        $result = array();
        foreach ($query->result_array() as $item) {
            $result += array($item['class'] => $item['name']);
        }
        return $result;
    }

    public function getClassPoints($subject, $class) {
        /*$this->db->query('SELECT points.student, points.date, points.mark, users.last_name FROM points, users WHERE users.id = points.student AND points.subject = 1');*/
        $where = 'users.id = points.student';
        $query = $this->db->select('points.student, points.date, points.mark, users.last_name')
            ->where($where)
            ->where('points.subject', $subject)
            ->where('users.class', $class)
            ->get('points, users');
        return $query->result_array();
    }

    function getNews()
    {
        $query = $this->db->get('posts', 4);
        return $query->result_array();
    }

    public function getGroupNum($group)
    {
        return count($this->ion_auth->users($group));
    }

    public function getMessages()
    {
        $id = $this->ion_auth->user()->row()->id;
        $query = $this->db->get_where('messages', array('recipient' => $id), 4);
        return $query->result_array();
    }

    function getHomeworks($class)
    {
        $query = $this->db->get_where('homeworks', array('class' => $class));
        return $query->result_array();
    }

    public function getClasses() {
        $query = $this->db->get_where('classes');
        $result = array();
        foreach ($query->result_array() as $item) {
            $result += array($item['id'] => $item['name']);
        }
        return $result;
    }

    function getFindedUsers($type, $data)
    {
        if ($type = 'name') {
            $query = $this->db->get_where('users', array('first_name' => $data));
            return $query->result_array();
        } elseif ($type = 'surname') {
            $query = $this->db->get_where('users', array('last_name' => $data));
            return $query->result_array();
        } elseif ($type = 'email') {
            $query = $this->db->get_where('users', array('email' => $data));
            return $query->result_array();
        }
    }


    public function create_class($name = '')
    {
        $existing_class = $this->db->get_where('classes', array('name' => $name));
        if ($existing_class !== 0) {
            $this->set_error('group_already_exists');
            return FALSE;
        }
        $this->db->insert('classes', array('name' => $name));
    }

    public function createNotice($class, $header, $content, $priority)
    {
        $data = array(
            'author' => $this->ion_auth->user()->row()->id,
            'class' => $class,
            'header' => $header,
            'content' => $content,
            'priority' => $priority
        );
        $this->db->insert('posts', $data);
        return true;
    }
}