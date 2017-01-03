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

    public function marksheet()
    {
        if ($this->ion_auth->logged_in()) {

            if ($this->ion_auth->in_group(3) || $this->ion_auth->is_admin()) {
                $this->load->view('_templates/logged/header');
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
            }
        }
    }

    public function lesson()
    {
        $this->load->view('_templates/logged/header');
        $data['subjects'] = $this->CRUD_model->getAccessedSubj($this->ion_auth->user()->row()->id);
        $data['classes'] = $this->CRUD_model->getAccessedClasses($this->ion_auth->user()->row()->id);
        if ($this->uri->uri_string() == '/tc/lesson/add') {
            if ($this->input->post('submit')) {
                $this->form_validation->set_rules('subjects', 'Предмет', 'required');
                $this->form_validation->set_rules('classes', 'Клас', 'required');
                $data['existinfo'] = false;
                if ($this->form_validation->run() == TRUE) {
                    $data['existinfo'] = true;
                    $data['point'] = array(
                        '404' => 'Н',
                        '0' => 'Оцінка відсутня',
                        '2' => 2,
                        '3' => 3,
                        '4' => 4,
                        '5' => 5,
                        '6' => 6,
                        '7' => 7,
                        '8' => 8,
                        '9' => 9,
                        '10' => 10,
                        '11' => 11,
                        '12' => 12
                    );
                    $data['type'] = array(
                        '1' => 'Поточна',
                        '2' => 'С/Р',
                        '3' => 'К/Р',
                        '4' => 'Д/З'
                    );
                    $data['class_students'] = $this->CRUD_model->getStudents($this->input->post('classes'));
                    $data['subject_name'] = $this->CRUD_model->getSubjectName($this->input->post('subjects'));
                    $data['class_name'] = $this->CRUD_model->getClassName($this->input->post('classes'));
                    $this->load->view('dash/teacher/report_lesson', $data);
                } else {
                    $this->load->view('dash/teacher/report_lesson', $data);
                }
                if ($this->input->post('submit_send')) {
                    $this->form_validation->set_rules('student', 'Учень', 'required');
                    $this->form_validation->set_rules('point', 'Оцінка', 'required');
                    $this->form_validation->set_rules('type', 'Тип', 'required');
                    if ($this->form_validation->run() == TRUE) {
                        $this->CRUD_model->addPoint();
                    } else {
                        echo validation_errors();
                    }
                    $this->load->view('dash/teacher/report_lesson', $data);
                } else {
                    echo 'KEKEEgdfgdfgEE';
                    $this->load->view('dash/teacher/report_lesson', $data);
                }
            } else {
                echo 'KEKEEEE';
                $this->load->view('dash/teacher/report_lesson', $data);
            }
            $this->load->view('_templates/logged/footer');
        } else {
            echo 'KEK';
        }
        $data['existinfo'] = FALSE;
    }
}