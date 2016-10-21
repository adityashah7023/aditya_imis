<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Internship
 *
 * @author adity
 */
class Internship extends CI_Controller{
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
        if($data['user']['user_type']!="student"){ show_404(); }
    }
    
    function index(){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model('Student_Model','stu');
        $data['student']=$this->stu->select_by_id($data['user']['user_id']);
        $this->load->model('Student_Internship_Model','stin');
        $this->load->model('Student_Certification_Model','student_certificate');
        $data['student_certificate']=$this->student_certificate->select_by_stu_num($data['user']['user_id']);
        $this->load->model('Student_Education_Model','student_education');
        $data['student_education']=$this->student_education->select_by_stu_num($data['user']['user_id']);
        $this->load->model('Work_Experience_Model','student_experience');
        $data['student_experience']=$this->student_experience->select_by_stu_num($data['user']['user_id']);
        $this->load->model('Skill_Type_Model','skill_type');
        $data['skill_type']=$this->skill_type->select_all();
        $this->load->model('Student_Skill_Model','student_skill');
        $data['student_skill']=$this->student_skill->select_by_stu_num($data['user']['user_id']);
        $this->load->model('Student_Job_Interest_Model','student_job');
        $data['student_intern']=$this->stin->select_by_stu_num($data['user']['user_id']);
        $this->load->view('student/list_student_internship_view',array('data'=>$data));
    }
    
    function login(){
         redirect(base_url('Login'), 'refresh');
     }
}
