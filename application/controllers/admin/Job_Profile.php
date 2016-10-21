<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Job_Profile
 *
 * @author adity
 */
class Job_Profile extends CI_Controller{
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
        $this->load->model('Job_Model','job');
        $data['job']=$this->job->select_by_id($param);
        $this->load->model('Job_Skill_Model','job_skill');
        $data['skill']=$this->job_skill->select_by_job_id($param);
        $this->load->model('Skill_Type_Model','skill_type');
        $data['skill_type']=$this->skill_type->select_all();
        $this->load->model('Student_Job_Interest_Model','student_job');
        $data['student_job']=$this->student_job->select_by_job_id($param);
        $this->load->model('Student_Internship_Model','student_intern');
        $data['student_intern']=$this->student_intern->select_by_job_id($param);
        $this->load->view('admin/job_profile_view',array('data'=>$data));
    }
    
    function approve($id,$job_id){
        $this->load->model('Student_Job_Interest_Model','student_job');
        $data['update']['stjin_verification_status']="approved";
        $q=$this->student_job->update_verification_status($data['update'],$id);
        redirect(base_url('admin/Job_Profile/'.$job_id));  
    }
    
    function reject($id,$job_id){
        $this->load->model('Student_Job_Interest_Model','student_job');
        $data['update']['stjin_verification_status']="rejected";
        $this->student_job->update_verification_status($data['update'],$id);
        redirect(base_url('admin/Success'));  
    }
    
    function login(){
         redirect(base_url('admin/Login'), 'refresh');
    }

}
