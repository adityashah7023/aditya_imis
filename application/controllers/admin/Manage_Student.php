<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of manage_student
 *
 * @author adity
 */
class Manage_Student extends CI_Controller{
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
    
    function index(){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model('Student_Model','student');
        $data['student']=$this->student->select_all();
        $this->load->view('admin/list_student_view',array('data'=>$data));
    }
    
    function edit($id){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model('Student_Model','student');
        $data['student']=$this->student->select_by_id($id);
        $data['student']['stu_num']=$id;
        $this->load->view('admin/update_student_view',array('data'=>$data));
    }
    
    function update($id){
        $data['update']['stu_fname']=$this->input->get_post('fname');
        $data['update']['stu_mname']=$this->input->get_post('mname');
        $data['update']['stu_lname']=$this->input->get_post('lname');
        $data['update']['stu_gender']=$this->input->get_post('gender');
        $data['update']['stu_email']=$this->input->get_post('email');
        $data['update']['stu_contact_no']=$this->input->get_post('contact');
        $data['update']['stu_nationality']=$this->input->get_post('nationality');
        $data['update']['stu_internship_status']=$this->input->get_post('intern_status');
        $data['update']['stu_semester']=$this->input->get_post('semester');
        $data['update']['stu_intake_year']=$this->input->get_post('year');
        $data['update']['stu_intake_term']=$this->input->get_post('term');
        $this->load->model("Student_Model","student");
        $ret=$this->student->update_student($id,$data['update']);
        if($ret==1){
            redirect(base_url('admin/Manage_Student'));
        }
        else{
            $data['admin']=$this->admin->select_by_id($id);
            redirect(base_url('admin/Manage_Student/edit')."/".$id);  
        }
    }
    
    function add(){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->view('admin/add_student_view',array('data'=>$data));
    }
    
    function insert(){
        
        $this->form_validation->set_rules('num', 'stu_num', 'callback_num_check');
        
        if ($this->form_validation->run() == FALSE)
        {
                $data['user']=$this->session->userdata('logged_in');
                $this->load->view('admin/add_student_view',array('data'=>$data));
        }
        else
        {
            $data['insert']['stu_num']=$this->input->get_post('num');
            $data['insert']['stu_fname']=$this->input->get_post('fname');
            $data['insert']['stu_mname']=$this->input->get_post('mname');
            $data['insert']['stu_lname']=$this->input->get_post('lname');
            $data['insert']['stu_gender']=$this->input->get_post('gender');
            $data['insert']['stu_email']=$this->input->get_post('email');
            $data['insert']['stu_contact_no']=$this->input->get_post('contact');
            $data['insert']['stu_nationality']=$this->input->get_post('nationality');
            $data['insert']['stu_internship_status']=$this->input->get_post('intern_status');
            $data['insert']['stu_semester']=$this->input->get_post('semester');
            $data['insert']['stu_intake_year']=$this->input->get_post('year');
            $data['insert']['stu_intake_term']=$this->input->get_post('term');
            $ret=$this->student->insert($data['insert']);
            if($ret==1){
                redirect(base_url('admin/Manage_Student'));
            }
            else{
                redirect(base_url('admin/Manage_Student/add'));  
            }
        }
    }
    
    function num_check(){
        $this->load->model('Student_Model','student');
        $data['student']=$this->student->select_by_id($this->input->get_post('num'));
        if($data['student']['count']==0){
            return TRUE;
        } else {
            $this->form_validation->set_message('num_check', 'Student already exist.');
            return FALSE;
        }
    }
    
    function delete($id){
        $this->load->model("Student_Model","student");
        $ret=$this->student->remove($id);
        if($ret==1){
            redirect(base_url('admin/Success'));  
        }
        else{
            $this->load->view('login_view');
        }
    }
    
    function login(){
         redirect(base_url('admin/Login'), 'refresh');
     }
}
