<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Student_Model', 'sm');
    }

    public function post_student_details()
    {
        $id  = $this->uri->segment(3);
        if (is_numeric($id) && !empty($id)) {
            $data['student'] = $this->sm->is_student_details_exist($id);
            $this->load->view('Student_Form', $data);
        }
        $this->load->view('Student_Form');
    }

    public function set_student_details()
    {
        $data = $_POST;
        $data['jogging'] = $this->input->post('jogging');
        $data['swimming'] = $this->input->post('swimming');
        echo $this->sm->set_student_details($data);
    }

    public function delete_student_details()
    {
        echo $this->sm->delete_student_details($_POST);
    }

    public function get_all_records()
    {
        $studentDetails = $this->sm->get_all_records();
        echo json_encode($studentDetails);
    }
}
