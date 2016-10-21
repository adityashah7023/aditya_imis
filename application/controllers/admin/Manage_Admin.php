<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of manage_admin
 * list | add | update | remove administrators
 * @author adity
 */
class Manage_Admin extends CI_Controller{
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
    
    
    function index(){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model('Admin_Model','admin');
        $data['admin']=$this->admin->select_all();
        $this->load->view('admin/list_admin_view',array('data'=>$data));
    }
    
    function edit($id){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model('Admin_Model','admin');
        $data['admin']=$this->admin->select_by_id($id);
        $data['admin']['admin_id']=$id;
        $this->load->view('admin/update_admin_view',array('data'=>$data));
    }
    
    function update($id){
        $data['update']['admin_name']=$this->input->get_post('name');
        $data['update']['admin_email']=$this->input->get_post('email');
        $data['update']['admin_contact_no']=$this->input->get_post('contact');
        $this->load->model("Admin_Model","admin");
        $ret=$this->admin->update_profile($id,$data['update']);
        if($ret==1){
            redirect(base_url('admin/Manage_Admin'));
        }
        else{
            $data['admin']=$this->admin->select_by_id($id);
            redirect(base_url('admin/Manage_Admin/edit')."/".$id);  
        }
    }
    
    function add(){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->view('admin/add_admin_view',array('data'=>$data));
    }
    
    function insert(){
        
        $this->form_validation->set_rules('username', 'Username', 'callback_username_check');
        
        if ($this->form_validation->run() == FALSE)
        {
            
                $data['user']=$this->session->userdata('logged_in');
                $this->load->view('admin/add_admin_view',array('data'=>$data));
        }
        else
        {
            $data['insert']['admin_name']=$this->input->get_post('name');
            $data['insert']['admin_email']=$this->input->get_post('email');
            $data['insert']['admin_contact_no']=$this->input->get_post('contact');
            $data['insert']['admin_username']=$this->input->get_post('username');
            $ret=$this->admin->insert($data['insert']);
            if($ret==1){
                redirect(base_url('admin/Manage_Admin'));
            }
            else{
                redirect(base_url('admin/Manage_Admin/add'));  
            }
        }    
    }
    
    function delete($id){
        $this->load->model("Admin_Model","admin");
        $ret=$this->admin->remove($id);
        if($ret==1){
            redirect(base_url('admin/Success'));  
        }
        else{
            $this->load->view('login_view');
        }
    }
    
    function username_check(){
        $this->load->model('Admin_Model','admin');
        $data['admin']=$this->admin->select_by_username($this->input->get_post('username'));
        if($data['admin']['count']==0){
            return TRUE;
        } else {
            $this->form_validation->set_message('username_check', 'Username not available.');
            return FALSE;
        }
    }
    
    function login(){
         redirect(base_url('admin/Login'), 'refresh');
    }
}
