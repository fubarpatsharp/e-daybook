<?php

class CRUD_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getPoints($student, $subject)
    {
        if ($subject == 1) {
            $query = $this->db->get_where('points_ukrlang', array('student' => $student));
            return $query->result_array();
        }
    }

    function getNews()
    {
        $query = $this->db->get('posts', 4);
        return $query->result_array();
    }
    public function getGroupNum($group) {
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

    public function getClasses(){
        $query = $this->db->get('classes');
        return $query->result_array();
    }

    public function create_class($name = '')
    {
        $existing_class = $this->db->get_where('classes', array('name' => $name));
        if($existing_class !== 0)
        {
            $this->set_error('group_already_exists');
            return FALSE;
        }
        $this->db->insert('classes', array('name' => $name));
    }
}