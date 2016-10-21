<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Work_Experience
 *
 * @author adity
 */
class Work_Experience extends CI_Controller{
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
        $this->load->model('Work_Experience_Model','experience');
        $data['work_experience']=$this->experience->select_by_stu_num($data['user']['user_id']);
        $this->load->view('student/list_student_experience_view',array('data'=>$data));
    }
    
    function insert(){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model('Work_Experience_Model','student_experience');
        $data['insert']['stu_num']=$data['user']['user_id'];
        $data['insert']['woex_company_name']=$this->input->get_post('name');
        $data['insert']['woex_company_location']=$this->input->get_post('city');
        $data['insert']['woex_position']=$this->input->get_post('position');
        $data['insert']['woex_duties']=$this->input->get_post('duties');
        $data['insert']['woex_from_year']=$this->input->get_post('start_month')."-".$this->input->get_post('start');
        $data['insert']['woex_to_year']=$this->input->get_post('end_month')."-".$this->input->get_post('end');
        
        $q=$this->student_experience->insert($data['insert']);
        if($q>0){
            redirect(base_url('student/Work_Experience'));
        }
        else{
            redirect(base_url('student/Work_Experience/add'));
        }
    }
    
    function login(){
         redirect(base_url('Login'), 'refresh');
    }
    
    function delete($id){
        $this->load->model("Work_Experience_Model","student_experience");
        $ret=$this->student_experience->remove($id);
        if($ret==1){
            redirect(base_url('student/Success'));  
        }
        else{
            $this->load->view('login_view');
        }
    }
}
