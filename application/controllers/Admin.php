<?php

class Admin extends CI_Controller
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
                $this->load->view('dash/admin/index');
            } elseif ($this->ion_auth->in_group(2)) {
                $this->load->view('dash/student/index');
            } elseif ($this->ion_auth->in_group(3)) {
                $this->load->view('dash/teacher/index');
            } elseif ($this->ion_auth->in_group(4)) {
                $this->load->view('dash/parent/index');
            }
            $this->load->view('_templates/logged/footer');
        } else {
            redirect('auth/login', 'auto');
        }

    }

    public function manageUsers()
    {
        if ($this->ion_auth->logged_in()) {
            if ($this->ion_auth->is_admin()) {
                $this->load->view('_templates/logged/header');
                $this->load->view('dash/admin/users_manage');
                $this->load->view('_templates/logged/footer');
            } else {
                show_error('Ви не адміністратор!', 403);
            }
        }
    }

    public function getSelectedUsers()
    {
        $data = $this->input->post('data');
        $type = $this->input->post('type');
        $this->data['users'] = $this->CRUD_model->getFindedUsers($data, $type);
        return $this->data['users'];

        $this->load->view('_templates/logged/header');
        $this->load->view('dash/admin/getSelectedUsers');
        $this->load->view('_templates/logged/footer');

    }

    public function points()
    {
        if ($this->ion_auth->logged_in()) {

            $this->load->view('_templates/logged/header');
            $this->load->view('dash/student/points');
            $this->load->view('_templates/logged/footer');
        }
    }

    public function createClass() {
        if ($this->ion_auth->logged_in()) {
            $data = array('classes_entries' => $this->CRUD_model->getClasses());
            $this->load->view('_templates/logged/header');
            if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
                redirect('auth', 'refresh');
            }
            if ($this->form_validation->run() == TRUE)
            {
                $this->CRUD_model->createClass($this->input->post('classname'));
                redirect("admin/createClass", 'refresh');
            }
            else {

            }
            $this->parser->parse('dash/admin/createClass', $data);
            $this->load->view('_templates/logged/footer');

        }
    }

}