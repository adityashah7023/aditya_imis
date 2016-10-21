<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author adity
 */
class Dashboard extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('M_Login','',TRUE);
        $this->load->helper('url');
        $this->load->library(array('form_validation','session'));
        if(!$this->session->userdata('logged_in'))
        {
            $this->login();
        } 
        $data['user']=$this->session->userdata('logged_in');
        if($data['user']['user_type']!="admin"){ show_404(); }
    }
    //put your code here
    function index(){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model("Admin_Model","admin");
        $data['admin']=$this->admin->select_by_id($data['user']['user_id']);
        $this->load->model("Student_Model",'student');
        $this->load->model("Job_Model",'job');
        $this->load->model("Company_Model",'company');
        $data['job']=$this->job->select_all_order_desc();
        $data['company']=$this->company->select_all();
        $data['student']=$this->student->select_all();
        $hired=0;$available=0;
        for($i=0;$i<$data['student']['count'];$i++){
            if($data['student'][$i]['stu_internship_status']=="Hired"){
                $hired++;
            }
            else {
                $available++;
            }
        }
        $data['hired']=$hired;
        $data['available']=$available;
        $this->load->view("admin/dashboard_view",array('data'=>$data));
    }
    
    function logout() {
        $session_data = $this->session->userdata('logged_in');
        //remove all session data
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect(base_url('admin/Login'), 'refresh');
     }
    
    function login(){
         redirect(base_url('admin/Login'), 'refresh');
     }
}
