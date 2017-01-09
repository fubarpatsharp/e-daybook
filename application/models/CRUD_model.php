<?php

class CRUD_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getTeacherInfo($teacher)
    {
        $teacher_info = $this->db->get_where('teachers', array('teacher' => $teacher));
        return $teacher_info->result_array();
    }

    //TODO: доработать эту функцию
    public function getTeachers()
    {

        $data2 = 'teachers.teacher = users.id';
        $query = $this->db->select('users.first_name, users.last_name, classes.teacher')
            ->where($data2)
            ->get('`users`,teachers,classes');
        return $query->result_array();
    }

    public function getAccessedSubj($teacher)
    {
        $query = $this->db->select('name, subject')
            ->where('accessed_subj.teacher', $teacher)
            ->join('subjects', 'accessed_subj.subject = subjects.id')
            ->get('accessed_subj');
        $result = array();
        foreach ($query->result_array() as $item) {
            $result += array($item['subject'] => $item['name']);
        }
        return $result;
    }

    public function getSubjects()
    {
        $query = $this->db->get_where('subjects');
        $result = array();
        foreach ($query->result_array() as $item) {
            $result += array($item['id'] => $item['name']);
        }
        return $result;
    }

    public function getSubjectName($subject)
    {
        $query = $this->db->select('name')
            ->where('id', $subject)
            ->get('subjects');
        return $query->row()->name;
    }

    public function getAccessedClasses($teacher)
    {
        $data = 'accessed_classes.class = classes.id';
        $query = $this->db->select('accessed_classes.class, classes.name')
            ->where($data)
            ->where('accessed_classes.teacher', $teacher)
            ->get('accessed_classes, classes');
        $result = array();
        foreach ($query->result_array() as $item) {
            $result += array($item['class'] => $item['name']);
        }
        return $result;
    }

    public function getClassPoints($subject, $class)
    {
        /*$this->db->query('SELECT points.student, points.date, points.mark, users.last_name FROM points, users WHERE users.id = points.student AND points.subject = 1');*/
        $where = 'users.id = points.student';
        $query = $this->db->select('points.student, points.date, points.mark, users.last_name')
            ->where($where)
            ->where('points.subject', $subject)
            ->where('users.class', $class)
            ->get('points, users');
        return $query->result_array();
    }

    public function getStudents($class)
    {
        $query = $this->db->select('users.last_name, users.first_name, users.id')
            ->where('users.class', $class)
            ->get('users');
        $result = array();
        foreach ($query->result_array() as $item) {
            $result += array($item['id'] => $item['last_name'] . ' ' . mb_strimwidth($item['first_name'], 0, 2, "."));
        }
        return $result;
    }

    function getNews()
    {
        $query = $this->db->get('posts', 4);
        return $query->result_array();
    }

    public function getGroupNum($group)
    {
        return count($this->ion_auth->users($group));
    }

    public function getMessages()
    {
        $id = $this->ion_auth->user()->row()->id;
        $query = $this->db->get_where('messages', array('recipient' => $id), 4);
        return $query->result_array();
    }

    function getHomeworks($class)
    {
        $query = $this->db->query('SELECT `homeworks`.`date`, `homeworks`.`content`,`homeworks`.`file`, `subjects`.`name`, `homeworks`.`id` FROM `homeworks`, `subjects` WHERE `homeworks`.`date` IN (SELECT `date` FROM `homeworks` GROUP BY `date`) AND `homeworks`.`subject` = `subjects`.`id` AND `homeworks`.`class` = ' . $class);
        $data = array();
        foreach ($query->result() as $row) {
            $data += array($row->id => array($row->date, $row->content, $row->file, $row->name));
        }
        return $data;
    }

    public function getClasses()
    {
        $query = $this->db->get_where('classes');
        return $query->result_array();
    }

    public function getClassName($class)
    {
        $query = $this->db->select('name')
            ->where('id', $class)
            ->get('classes');
        return $query->row()->name;
    }

    function getFindedUsers($type, $data)
    {
        if ($type == 1) {
            $query = $this->db->select('id, email, first_name, last_name, phone, ip_address')
                ->where('first_name', $data)
                ->get('users');
            return $query->result_array();
        } elseif ($type == 2) {
            $query = $this->db->select('id, email, first_name, last_name, phone, ip_address')
                ->where('last_name', $data)
                ->get('users');
            return $query->result_array();
        } elseif ($type == 3) {
            $query = $this->db->select('id, email, first_name, last_name, phone, ip_address')
                ->where('email', $data)
                ->get('users');
            return $query->result_array();
        }
    }

    public function create_class($name)
    {
        $this->db->insert('classes', array('name' => $name));
        return true;
    }

    public function deleteClass($id)
    {
        $this->db->delete('classes', array('id' => $id));
        return true;
    }

    public function getClass($id)
    {
        return $this->db->get_where('classes', array('id' => $id))->result_array();
    }

    public function createNotice($class, $header, $content, $priority)
    {
        $data = array(
            'author' => $this->ion_auth->user()->row()->id,
            'class' => $class,
            'header' => $header,
            'content' => $content,
            'priority' => $priority
        );
        $this->db->insert('posts', $data);
        return true;
    }

    public function addPoint($subject, $student, $mark, $comment)
    {
        $data = array(
            'subject' => $subject,
            'teacher' => $this->ion_auth->user()->row()->id,
            'student' => $student,
            'mark' => $mark,
            'comment' => $comment
        );
        $this->db->insert('points', $data);
        return true;
    }

    public function addHomework($class, $subject, $teacher, $date, $file = '', $content)
    {
        $data = array(
            'class' => $class,
            'subject' => $subject,
            'teacher' => $teacher,
            'date' => $date,
            'file' => $file,
            'content' => $content
        );
        $this->db->insert('homeworks', $data);
        return true;
    }

    public function addSchedule($class, $day, $subject_0 = NULL, $subject_1 = NULL, $subject_2 = NULL, $subject_3 = NULL, $subject_4 = NULL, $subject_5 = NULL, $subject_6 = NULL, $subject_7 = NULL, $subject_8 = NULL)
    {
        $data = array(
            'class' => $class,
            'day' => $day,
            'zero' => $subject_0,
            'first' => $subject_1,
            'second' => $subject_2,
            'third' => $subject_3,
            'fourth' => $subject_4,
            'fifth' => $subject_5,
            'sixth' => $subject_6,
            'seventh' => $subject_7,
            'eight' => $subject_8,
        );
        $this->db->insert('schedule', $data);
    }
}