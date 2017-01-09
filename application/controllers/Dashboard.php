<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('ion_auth', 'parser', 'form_validation'));
        $this->load->helper(array('html', 'form'));
        $this->load->model('CRUD_model');
    }

    public function index()
    {
        if ($this->ion_auth->logged_in()) {
            $this->load->view('_templates/logged/header');
            if ($this->ion_auth->in_group(1)) {
                redirect('admin/index', 'refresh');
            } elseif ($this->ion_auth->in_group(2)) {
                redirect('student/index', 'refresh');
            } elseif ($this->ion_auth->in_group(3)) {
                redirect('teacher/index', 'refresh');
            } elseif ($this->ion_auth->in_group(4)) {
                redirect('parent/index', 'refresh');
            }
            $this->load->view('_templates/logged/footer');
        } else {
            redirect('auth/login', 'auto');
        }
    }

}