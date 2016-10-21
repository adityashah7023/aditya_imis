<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of manage_profile
 *
 * @author adity
 */
class My_Profile extends CI_Controller {
    //put your code here
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
    
    function index(){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model("Admin_Model","admin");
        $data['admin']=$this->admin->select_by_id($data['user']['user_id']);
        $data['update']['status']="";
        $this->load->view("admin/my_profile_view",array('data'=>$data));
    }
    
    function edit(){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model("Admin_Model","admin");
        $data['admin']=$this->admin->select_by_id($data['user']['user_id']);
        $data['update']['status']="";
        $this->load->view("admin/my_profile_edit_view",array('data'=>$data));
    }
    
    function update(){
        $data['user']=$this->session->userdata('logged_in');
        $data['update']['admin_name']=$this->input->get_post('name');
        $data['update']['admin_email']=$this->input->get_post('email');
        $data['update']['admin_contact_no']=$this->input->get_post('contact');
        $this->load->model("Admin_Model","admin");
        $ret=$this->admin->update_profile($data['user']['user_id'],$data['update']);
        if($ret==1){
            $data['admin']=$this->admin->select_by_id($data['user']['user_id']);
            $data['update']['status']="true";
            $this->load->view("admin/my_profile_view",array('data'=>$data));
        }
        else{
            $data['admin']=$this->admin->select_by_id($data['user']['user_id']);
            $data['update']['status']="false";
            $this->load->view("admin/my_profile_edit_view",array('data'=>$data));    
        }
    }
    
     function login(){
         redirect(base_url('admin/Login'), 'refresh');
     }
}
