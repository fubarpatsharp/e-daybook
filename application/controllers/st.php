<?php

class st extends CI_Controller
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
            if ($this->ion_auth->in_group()) {}
        }
    }

    public function points()
    {
        if ($this->ion_auth->logged_in()) {

            $this->load->view('_templates/logged/header');
            $this->load->view('dash/student/points');
            $this->load->view('_templates/logged/footer');
        }
    }
}