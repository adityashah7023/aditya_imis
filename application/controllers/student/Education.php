<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Education
 *
 * @author adity
 */
class Education extends CI_Controller{
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
        $this->load->model('Student_Education_Model','education');
        $data['student_education']=$this->education->select_by_stu_num($data['user']['user_id']);
        $this->load->view('student/list_student_education_view',array('data'=>$data));
    }
    
    function insert(){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model('Student_Education_Model','education');
        $data['insert']['stu_num']=$data['user']['user_id'];
        $data['insert']['sted_degree_name']=$this->input->get_post('degree');
        $data['insert']['sted_uni_name']=$this->input->get_post('uni_name');
        $data['insert']['sted_uni_city']=$this->input->get_post('uni_city');
        $data['insert']['sted_start_year']=$this->input->get_post('start');
        $data['insert']['sted_end_year']=$this->input->get_post('end');
        $data['insert']['sted_gpa']=$this->input->get_post('gpa');
        $data['insert']['sted_major']=$this->input->get_post('major');
        
        $q=$this->education->insert($data['insert']);
        if($q>0){
            redirect(base_url('student/Education'));
        }
        else{
            redirect(base_url('student/Education/add'));
        }
    }
    
    function login(){
         redirect(base_url('Login'), 'refresh');
    }
    
    function delete($id){
        $this->load->model("Student_Education_Model","student_education");
        $ret=$this->student_education->remove($id);
        if($ret==1){
            redirect(base_url('student/Success'));  
        }
        else{
            $this->load->view('login_view');
        }
    }
}
