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
        if ($this->ion_auth->logged_in()) {
            if ($this->ion_auth->in_group(3) || $this->ion_auth->is_admin()) {
                $this->load->view('_templates/logged/header');
                $data['news'] = $this->CRUD_model->getNews();
                $data['messages'] = $this->CRUD_model->getMessages();
                $this->load->view('dash/teacher/index', $data);
                $this->load->view('_templates/logged/footer');
            }
        }
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
        $this->load->library('session');
        if ($this->ion_auth->logged_in()) {
            if ($this->ion_auth->in_group(3) || $this->ion_auth->is_admin()) {
                $this->load->view('_templates/logged/header');
                $data['exist_information'] = FALSE;
                $data['accessed_subjects'] = $this->CRUD_model->getAccessedSubj($this->ion_auth->user()->row()->id);
                $data['accessed_classes'] = $this->CRUD_model->getAccessedClasses($this->ion_auth->user()->row()->id);
                if ($this->input->post('submit_choose')) {
                    $_SESSION['class'] = array_values($this->input->post('class'));
                    $_SESSION['subject'] = $this->input->post('subject');
                    redirect('tc/lesson/add');
                } else {
                    $this->load->view('dash/teacher/lesson', $data);
                }

                if ($this->uri->uri_string() == 'tc/lesson/add' && $_SESSION['class'] != NULL && $_SESSION['subject'] != NULL) {
                    $data['exist_information'] = TRUE;
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
                    $data['class_name'] = $_SESSION['class'];
                    $data['subject_name'] = $_SESSION['subject'];
                    $data['class_students'] = $this->CRUD_model->getStudents($_SESSION['class']);
                    $data['subject_name'] = $this->CRUD_model->getSubjectName($_SESSION['subject']);
                    $this->load->view('dash/teacher/lesson_add', $data);

                    if ($this->input->post('submit_send')) {
                        $this->form_validation->set_rules('student', 'Учень', 'required');
                        $this->form_validation->set_rules('point', 'Оцінка', 'required');
                        $this->form_validation->set_rules('type', 'Тип', 'required');
                        if ($this->form_validation->run() == TRUE) {
                            $this->CRUD_model->addPoint();
                        } else {
                            echo validation_errors();
                        }
                    }
                }

                $this->load->view('_templates/logged/footer');
            }
        }

    }

    public function homeworks()
    {
        if ($this->ion_auth->logged_in()) {
            if ($this->ion_auth->in_group(3) || $this->ion_auth->is_admin()) {
                $this->load->view('_templates/logged/header');
                if ($this->uri->uri_string() == 'tc/homeworks') {
                    $data['accessed_subjects'] = $this->CRUD_model->getAccessedSubj($this->ion_auth->user()->row()->id);
                    $data['accessed_classes'] = $this->CRUD_model->getAccessedClasses($this->ion_auth->user()->row()->id);
                    $data['datepicker'] = array('type' => 'date', 'class' => 'datepicker', 'name' => 'date');
                    $data['file'] = array('class' => 'file-path validate', 'name' => 'userfile');
                    $data['containment'] = array('name' => 'content');

                    $this->load->view('dash/teacher/homeworks', $data);
                    if ($this->input->post('submit')) {
                        $this->form_validation->set_rules('class', 'Клас', 'required');
                        $this->form_validation->set_rules('subject', 'Предмет', 'required');
                        $this->form_validation->set_rules('date', 'Дата', 'required');
                        $this->form_validation->set_rules('content', 'Вміст', 'required');
                        if ($this->form_validation->run()) {
                            if (!empty($_FILES['userfile']['name'])) {
                                $config['upload_path'] = './content/homeworks/';
                                $config['allowed_types'] = 'zip|rar';
                                $config['max_size'] = 10240;
                                $config['encrypt_name'] = TRUE;
                                $this->load->library('upload', $config);
                                if (!$this->upload->do_upload('userfile')) {
                                    $message = array('error' => $this->upload->display_errors());
                                    show_error('Щось пішло не так, код помилки 004. Лог:' . print_r($message));
                                } else {

                                    $this->CRUD_model->addHomework($this->input->post('class'), $this->input->post('subject'), $this->ion_auth->user()->row()->id, $this->input->post('date'), $this->upload->data()['file_name'], $this->input->post('content'));
                                }
                            } else {
                                $submit = $this->CRUD_model->addHomework($this->input->post('class'), $this->input->post('subject'), $this->ion_auth->user()->row()->id, $this->input->post('date'), NULL, $this->input->post('content'));
                                if ($submit == TRUE) {
                                    $data['message'] = 'Домашнє завдання було успішно додане';
                                } else {
                                    show_error('Нажаль, щось пішло не так. Код помилки - 004', '403', 'Oops');
                                }
                            }
                        }
                    }
                }
                elseif ($this->uri->uri_string() == 'tc/homeworks/show') {
                    $data['accessed_subjects'] = $this->CRUD_model->getAccessedSubj($this->ion_auth->user()->row()->id);
                    $data['accessed_classes'] = $this->CRUD_model->getAccessedClasses($this->ion_auth->user()->row()->id);
                    if ($this->input->post('submit')) {
                        $data['homeworks'] = $this->CRUD_model->getHomeworks($this->input->post('class'));
                    }
                    $this->load->view('dash/teacher/homeworks_show', $data);
                } else {
                    redirect('/tc/homeworks');
                }
                $this->load->view('_templates/logged/footer');
            }
        }
    }



}