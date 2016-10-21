<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Job
 *
 * @author adity
 */
class Job extends CI_Controller{
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
        $this->load->model('Job_Model','job');
        $data['job']=$this->job->select_all();
        $this->load->model('Student_Job_Interest_Model','student_job_interest');
        $data['student_job']=$this->student_job_interest->select_by_stu_num($data['user']['user_id']);
        $this->load->view('student/list_all_job_view',array('data'=>$data));
    }
    
    function apply($id,$ret_controller,$ret_value1=0,$ret_value2=0){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model("Student_Job_Interest_Model","student_job_interest");
        $data['insert']['stu_num']=$data['user']['user_id'];
        $data['insert']['job_id']=$id;
        $ret=$this->student_job_interest->insert($data['insert']);
        if($ret==1){
            if($ret_value2==0&&$ret_value1==0){
                redirect(base_url("student/".$ret_controller));
            }
            else if($ret_value2==0){
                redirect(base_url("student/".$ret_controller."/".$ret_value1));
            }
            redirect(base_url("student/".$ret_controller."/".$ret_value1."/".$ret_value2));
        }
        else{
            
        }
    }
    
    function view($param){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model('Company_Model','company');
        $data['company']=$this->company->select_by_id($param);
        $this->load->model('Job_Model','job');
        $data['job']=$this->job->select_by_comp_id($param);
        $this->load->model('Student_Job_Interest_Model','student_job_interest');
        $data['student_job']=$this->student_job_interest->select_by_stu_num($data['user']['user_id']);
        $this->load->view('student/list_job_view',array('data'=>$data));
    }
    
    function applied(){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model('Student_Job_Interest_Model','student_job_interest');
        $data['student_job']=$this->student_job_interest->select_by_stu_num_detailed($data['user']['user_id']);
        $this->load->view('student/list_job_applied_view',array('data'=>$data));
    }
    
    function login(){
         redirect(base_url('Login'), 'refresh');
     }
}
