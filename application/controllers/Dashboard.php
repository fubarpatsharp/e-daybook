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
            $data = array(
                'news_entries' => $this->CRUD_model->getNews(),
                'message_entries' => $this->CRUD_model->getMessages()
            );
            $this->load->view('_templates/logged/header');
            if ($this->ion_auth->in_group(1)) {
                $data += array(
                    'students' => $this->CRUD_model->getGroupNum(2),
                    'teachers' => $this->CRUD_model->getGroupNum(3),
                    'parents' => $this->CRUD_model->getGroupNum(4)
                );
                $this->parser->parse('dash/admin/index', $data);
            } elseif ($this->ion_auth->in_group(2)) {
                $this->parser->parse('dash/student/index', $data);
            } elseif ($this->ion_auth->in_group(3)) {
                $this->parser->parse('dash/teacher/index', $data);
            } elseif ($this->ion_auth->in_group(4)) {
                $this->parser->parse('dash/parent/index', $data);
            }
            $this->load->view('_templates/logged/footer');
        } else {
            redirect('auth/login', 'auto');
        }
    }

}