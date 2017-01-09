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
                    'parents' => $this->CRUD_model->getGroupNum(4),);
                $data['news'] = $this->CRUD_model->getNews();
                $data['messages'] = $this->CRUD_model->getMessages();
                $this->parser->parse('dash/admin/index', $data);
                $this->load->view('_templates/logged/footer');
            } else {
                show_error('Ви не адміністратор!', 403);
            }
        } else {
            redirect('auth/login', 'auto');
        }

    }

    public function users()
    {
        if ($this->ion_auth->logged_in()) {
            if ($this->ion_auth->is_admin()) {
                $this->load->view('_templates/logged/header');
                if ($this->uri->segment(3) == 'delete') {
                    $this->load->view('dash/admin/user_delete');
                } elseif ($this->uri->segment(3) == 'edit') {
                    $userID = $this->uri->segment(4);
                    redirect('/auth/edit_user/' . $userID);
                } elseif ($this->uri->segment(3) == 'create') {
                    $this->load->view('dash/admin/create_user');
                } else {
                    $data['message'] = NULL;
                    $data['information'] = NULL;
                    if ($this->input->post('submit')) {
                        $this->form_validation->set_rules('data', 'Дані', 'required')
                            ->set_rules('type', 'Тип', 'required');
                        if ($this->form_validation->run()) {
                            $data['information'] = $this->CRUD_model->getFindedUsers($this->input->post('type'), $this->input->post('data'));
                            var_dump($data['information']);
                            if (empty($information)) {
                                $data['message'] = 'Нажаль, нічого не було знайдено ;(';
                            }
                        } else {
                            $data['message'] = validation_errors();
                        }
                    }
                    $this->load->view('dash/admin/users_manage', $data);
                    $this->load->view('_templates/logged/footer');
                }
            } else {
                show_error('Ви не адміністратор!', 403);
            }
        }
    }

    public function points()
    {
        if ($this->ion_auth->logged_in()) {

            $this->load->view('_templates/logged/header');
            $this->load->view('dash/admin/points');
            $this->load->view('_templates/logged/footer');
        }
    }

    public function classes()
    {
        if ($this->ion_auth->logged_in()) {
            if ($this->ion_auth->in_group(3) || $this->ion_auth->is_admin()) {
                $data = array('classes_entries' => $this->CRUD_model->getClasses());
                $this->load->view('_templates/logged/header');
                $this->form_validation->set_rules('classname', 'Назва класу', 'required');
                $data['message'] = '';
                if ($this->form_validation->run() == TRUE) {
                    $this->CRUD_model->create_class($this->input->post('classname'));
                    redirect("admin/classes", 'refresh');
                } else {
                    if ($this->uri->segment(3) == 'delete') {
                        $classID = $this->uri->segment(4);
                        $this->CRUD_model->deleteClass($classID);
                        $data['message'] = '<blockquote>Клас було успішно видалено</blockquote>';
                        $this->parser->parse('dash/admin/create_class', $data);
                    } elseif ($this->uri->segment(3) == 'edit') {
                        $classID = $this->uri->segment(4);
                        $class_info = $this->CRUD_model->getClass($classID);
                        $this->parser->parse('dash/admin/edit_class', $data);
                    } else {
                        $this->parser->parse('dash/admin/create_class', $data);
                    }
                }
                $this->load->view('_templates/logged/footer');

            }
        }
    }

    public function notices()
    {
        if ($this->ion_auth->logged_in()) {
            if ($this->ion_auth->in_group(3) || $this->ion_auth->is_admin()) {
                $this->load->view('_templates/logged/header');
                $data['classes'] = $this->CRUD_model->getClasses();
                $data['priority'] = array(
                    '1' => 'Низький',
                    '2' => 'Середній',
                    '3' => 'Високий'
                );
                $this->form_validation->set_rules('name', 'Назва', 'required');
                $this->form_validation->set_rules('content', 'Вміст', 'required');
                if ($this->form_validation->run() == FALSE) {
                    if ($this->uri->segment(3) == 'delete') {

                    } elseif ($this->uri->segment(3) == 'edit') {
                        $this->load->view('dash/teacher/notices_edit', $data);
                    }
                } else {
                    $this->CRUD_model->createNotice($this->input->post('class'), $this->input->post('name'), $this->input->post('content'), $this->input->post('priority'));
                    redirect('/', 'refresh');
                }

                $this->load->view('_templates/logged/footer');

            }
        }
    }

    public function schedule()
    {
        if ($this->ion_auth->logged_in()) {
            if ($this->ion_auth->is_admin()) {
                $this->load->view('_templates/logged/header');
                $data['classes'] = $this->CRUD_model->getClasses();
                $data['days'] = array(1 => 'Понеділок', 2 => 'Вівторок', 3 => 'Середа', 4 => 'Четвер', 5 => 'Пятниця');
                $data['subjects'] = $this->CRUD_model->getSubjects();
                $data['message'] = NULL;
                if ($this->input->post('submit')) {
                    $data['message'] = 'Розклад дня обраного дня було додано!';
                    $this->CRUD_model->addSchedule(
                        $this->input->post('class'),
                        $this->input->post('day'),
                        $this->input->post('subject0'),
                        $this->input->post('subject1'),
                        $this->input->post('subject2'),
                        $this->input->post('subject3'),
                        $this->input->post('subject4'),
                        $this->input->post('subject5'),
                        $this->input->post('subject6'),
                        $this->input->post('subject7'),
                        $this->input->post('subject8')
                    );
                }
                $this->load->view('dash/teacher/schedule', $data);
                $this->load->view('_templates/logged/footer');
            } else {
                show_error('У вас немає доступу до цієї сторінки', 403);
            }
        } else {
            show_error('У вас немає доступу до цієї сторінки', 403);
        }

    }

    public function support()
    {
        if ($this->ion_auth->logged_in()) {
            $this->load->view('_templates/logged/header');
            $this->load->view('dash/admin/support');
            $this->load->view('_templates/logged/footer');
        } else {
            $this->load->view('_templates/unlogged/header');
            $this->load->view('dash/admin/support');
            $this->load->view('_templates/unlogged/footer');
        }
    }
}