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

    public function points()
    {
        if ($this->ion_auth->logged_in()) {

            if ($this->ion_auth->in_group(3) || $this->ion_auth->is_admin()) {
                $this->load->view('_templates/logged/header');
                $this->benchmark->mark('code_start');
                $data['subjects'] = $this->CRUD_model->getAccessedSubj($this->ion_auth->user()->row()->id);
                $data['classes'] = $this->CRUD_model->getAccessedClasses($this->ion_auth->user()->row()->id);
                $data['existinfo'] = FALSE;
                if ($this->input->post('submit_show')) {
                    $this->load->library('table');
                    $data['existinfo'] = false;
                    $this->form_validation->set_rules('subject_show', 'Предмет', 'required');
                    $this->form_validation->set_rules('class_show', 'Клас', 'required');
                    if ($this->form_validation->run() == TRUE) {
                        $info = $this->CRUD_model->getClassPoints($this->input->post('subject_show'), $this->input->post('class_show'));
                        $data += array('points_entries' => $info);
                        $data['info'] = $info;
                        $data['table'] = $this->table->generate($info);
                        $data['existinfo'] = true;
                        $data['subject_name'] = $this->CRUD_model->getSubjectName($this->input->post('subject_show'));
                        $data['class_name'] = $this->CRUD_model->getClassName($this->input->post('class_show'));
                        $this->load->view('dash/teacher/points', $data);
                    } else {
                        $this->load->view('dash/teacher/points', $data);
                    }
                } elseif ($this->input->post('submit_add')) {
                    $this->load->view('dash/teacher/points', $data);
                } elseif ($this->input->post('submit_edit')) {
                    $this->load->view('dash/teacher/points', $data);
                } else {
                    $this->load->view('dash/teacher/points', $data);
                }


                $this->load->view('_templates/logged/footer');
                $this->benchmark->mark('code_end');
                echo $this->benchmark->elapsed_time('code_start', 'code_end');
            }
        }
    }

    public function report_lesson()
    {
        $this->load->view('_templates/logged/header');
        $data['subjects'] = $this->CRUD_model->getAccessedSubj($this->ion_auth->user()->row()->id);
        $data['classes'] = $this->CRUD_model->getAccessedClasses($this->ion_auth->user()->row()->id);
        $this->load->view('dash/teacher/report_lesson', $data);
        $this->load->view('_templates/logged/footer');
    }
}