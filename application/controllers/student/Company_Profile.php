<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Company_Profile
 *
 * @author adity
 */
class Company_Profile extends CI_Controller{
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
    
    function _remap($param){
        if(is_numeric($param)){
            $this->index($param);
        }
    }
    
    function index($param){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model('Company_Model','company');
        $data['company']=$this->company->select_by_id($param);
        $this->load->model('Job_Model','job');
        $data['job']=$this->job->select_by_comp_id($param);
        $this->load->model('Student_Job_Interest_Model','student_job_interest');
        $data['student_job']=$this->student_job_interest->select_by_stu_num($data['user']['user_id']);
        $this->load->view('student/company_profile_view',array('data'=>$data));
    }
    
    function login(){
         redirect(base_url('Login'), 'refresh');
     }
}
