<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Certification
 *
 * @author adity
 */
class Certificate extends CI_Controller{
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
        $this->load->model('Certification_Model','certificate');
        $data['certificate']=$this->certificate->select_all();
        $this->load->model('Student_Certification_Model','student_certificate');
        $data['student_certificate']=$this->student_certificate->select_by_stu_num($data['user']['user_id']);
        $this->load->view('student/list_student_certificate_view',array('data'=>$data));
    }
    
    function add(){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model('Certification_Model','certificate');
        $data['certificate']=$this->certificate->select_all();
        $this->load->model('Student_Certification_Model','student_certificate');
        $data['student_certificate']=$this->student_certificate->select_by_stu_num($data['user']['user_id']);
        $this->load->view('student/add_student_certificate_view',array('data'=>$data));
    }
    
    function insert(){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model('Student_Certification_Model','student_certificate');
        $data['insert']['stu_num']=$data['user']['user_id'];
        $data['insert']['cert_id']=$this->input->get_post('cert');
        $data['insert']['stce_received_date']=$this->input->get_post('rec_date');
        
        $q=$this->student_certificate->insert($data['insert']);
        if($q>0){
            redirect(base_url('student/Certificate'));
        }
        else{
            redirect(base_url('student/Certificate/add'));
        }
    }
    
    function insert_certification(){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model('Certification_Model','certificate');
        $data['insert']['cert_name']=$this->input->get_post('name');
        $data['insert']['cert_body']=$this->input->get_post('auth');
        
        $q=$this->certificate->insert($data['insert']);
        if($q>0){
            redirect(base_url('student/Certificate/add'));
        }
        else{
            redirect(base_url('student/Certificate/add'));
        }
    }
    
    function login(){
         redirect(base_url('Login'), 'refresh');
    }
    
    function delete($id){
        $this->load->model("Student_Certification_Model","student_certificate");
        $ret=$this->student_certificate->remove($id);
        if($ret==1){
            redirect(base_url('student/Success'));  
        }
        else{
            $this->load->view('login_view');
        }
    }
}
