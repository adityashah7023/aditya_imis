<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student_Profile
 *
 * @author adity
 */
class Student_Profile extends CI_Controller{
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('M_Login','',TRUE);
        $this->load->helper(array('form','url'));
        $this->load->library(array('form_validation','session'));
        if(!$this->session->userdata('logged_in'))
        {
            $this->login();
        } 
        $data['user']=$this->session->userdata('logged_in');
        if($data['user']['user_type']!="admin"){ show_404(); }
    }
    
    function _remap($param){
        if(is_numeric($param)){
            $this->index($param);
        }
        else if($param=="approve"){
            $this->approve($this->uri->segment(4),$this->uri->segment(5));
        }
        else if($param=="reject"){
            $this->reject($this->uri->segment(4),$this->uri->segment(5));
        }
    }
    
    function index($param){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model('Student_Model','student');
        $data['student']=$this->student->select_by_id($param);
        $this->load->model('Student_Certification_Model','student_certificate');
        $data['student_certificate']=$this->student_certificate->select_by_stu_num($param);
        $this->load->model('Student_Education_Model','student_education');
        $data['student_education']=$this->student_education->select_by_stu_num($param);
        $this->load->model('Work_Experience_Model','student_experience');
        $data['student_experience']=$this->student_experience->select_by_stu_num($param);
        $this->load->model('Skill_Type_Model','skill_type');
        $data['skill_type']=$this->skill_type->select_all();
        $this->load->model('Student_Skill_Model','student_skill');
        $data['student_skill']=$this->student_skill->select_by_stu_num($param);
        $this->load->model('Student_Job_Interest_Model','student_job');
        $data['job']=$this->student_job->select_by_stu_num($param);
        $this->load->model('Student_Internship_Model','student_intern');
        $data['student_intern']=$this->student_intern->select_by_stu_num($param);
        $this->load->view('admin/student_profile_view',array('data'=>$data));
    }
    
     function login(){
         redirect(base_url('admin/Login'), 'refresh');
     }
}
