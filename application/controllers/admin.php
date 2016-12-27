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
            if ($this->ion_auth->is_admin()) {
                $this->load->view('_templates/logged/header');
                $data = array(
                    'students' => $this->CRUD_model->getGroupNum(2),
                    'teachers' => $this->CRUD_model->getGroupNum(3),
                    'parents' => $this->CRUD_model->getGroupNum(4),
                    'news_entries' => $this->CRUD_model->getNews(),
                    'message_entries' => $this->CRUD_model->getMessages()
                );
                $this->parser->parse('dash/admin/index', $data);
                $this->load->view('_templates/logged/footer');
            } else {
                show_error('Ви не адміністратор!', 403);
            }
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
            $this->load->view('dash/admin/points');
            $this->load->view('_templates/logged/footer');
        }
    }

    public function createClass()
    {
        if ($this->ion_auth->logged_in()) {
            $data = array('classes_entries' => $this->CRUD_model->getClasses());
            $this->load->view('_templates/logged/header');
            if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
                redirect('auth', 'refresh');
            }
            if ($this->form_validation->run() == TRUE) {
                $this->CRUD_model->createClass($this->input->post('classname'));
                redirect("admin/createClass", 'refresh');
            } else {

            }
            $this->parser->parse('dash/admin/createClass', $data);
            $this->load->view('_templates/logged/footer');

        }
    }

    public function notices()
    {
        if ($this->ion_auth->logged_in()) {
            if ($this->ion_auth->in_group(3) || $this->ion_auth->is_admin()) {

                $this->load->view('_templates/logged/header');
                $data['classes'] = array(
                    '0' => 'Усі',
                    '1' => '11-A',
                    '2' => '10-A',
                    '3' => '9-A',
                    '4' => '8-A',
                    '5' => '7-A',
                    '6' => '6-A',
                    '7' => '6-Б',
                    '8' => '5-A'
                );
                $data['priority'] = array(
                    '1' => 'Низький',
                    '2' => 'Середній',
                    '3' => 'Високий'
                );
                $this->form_validation->set_rules('name', 'Назва', 'required');
                $this->form_validation->set_rules('content', 'Вміст', 'required');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('dash/teacher/notices', $data);
                } else {
                    $this->CRUD_model->createNotice($this->input->post('class'), $this->input->post('name'), $this->input->post('content'), $this->input->post('priority'));
                    redirect('/', 'refresh');
                }

                $this->load->view('_templates/logged/footer');

            }
        }
    }

}