<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student_Internship
 *
 * @author adity
 */
class Student_Internship extends CI_Controller{
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('M_Login','',TRUE);
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation','session'));
        if(!$this->session->userdata('logged_in'))
        {
            $this->login();
        } 
        $data['user']=$this->session->userdata('logged_in');
        if($data['user']['user_type']!="admin"){ show_404(); }
    }
    
    function add($id){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model("Student_Job_Interest_Model","stjin");
        $data['stjin']=$this->stjin->select_by_id($id);
        $this->load->view("admin/add_student_internship_view",array('data'=>$data));
    }
    
    function insert($id){
        $this->load->model("Student_Internship_Model","stin");
        $data['insert']['stjin_id']=$id;
        date_default_timezone_set("America/Toronto"); 
        $today=date('Y-m-d');
        $data['insert']['stin_assigned_date']=$today;
        $data['insert']['stin_start_date']=$this->input->get_post('from');
        $data['insert']['stin_end_date']=$this->input->get_post('end');
        $this->stin->insert($data['insert']);
        $this->load->model("Student_Model","stu");
        $data['update']['stu_internship_status']="Hired";
        $stu_id=$this->input->get_post('student');
        $this->stu->update_student($stu_id,$data['update']);
        redirect(base_url("admin/Manage_Job"));
    }
            
     function login(){
         redirect(base_url('admin/Login'), 'refresh');
     }
}
