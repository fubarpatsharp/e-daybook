<?php

class tc extends CI_Controller

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

    }

    public function points() {
        if ($this->ion_auth->logged_in()) {
            if ($this->ion_auth->in_group(3) || $this->ion_auth->is_admin()) {
                $this->load->view('_templates/logged/header');

                $this->form_validation->set_rules('subject', 'Предмет', 'required');
                $this->form_validation->set_rules('class', 'Клас', 'required');
                $data['subjects'] = $this->CRUD_model->getAccessedSubj($this->ion_auth->user()->row()->id);
                $data['classes'] = $this->CRUD_model->getAccessedClasses($this->ion_auth->user()->row()->id);
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('dash/teacher/points', $data);
                } else {
                    $info = $this->CRUD_model->getClassPoints($this->input->post('subject'), $this->input->post('class'));
                    $data = array('points_entries' => $info);
                    $this->parser->parse('dash/teacher/points_list', $data);
                }

                $this->load->view('_templates/logged/footer');
            }
        }
    }
}