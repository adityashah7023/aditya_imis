<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Manage_Company
 *
 * @author adity
 */
class Manage_Company extends CI_Controller{
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
        $this->load->model('Company_Model','company');
        $data['company']=$this->company->select_all();
        $this->load->view('admin/list_company_view',array('data'=>$data));
    }
    
    function edit($id){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model('Company_Model','company');
        $data['company']=$this->company->select_by_id($id);
        $data['company']['comp_id']=$id;
        $this->load->view('admin/update_company_view',array('data'=>$data));
    }
    
    function update($id){
        
        $data['update']['comp_name']=$this->input->get_post('name');
        $data['update']['comp_email']=$this->input->get_post('email');
        $data['update']['comp_phone']=$this->input->get_post('phone');
        $data['update']['comp_website']=$this->input->get_post('website');
        $data['update']['comp_street1']=$this->input->get_post('street1');
        $data['update']['comp_street2']=$this->input->get_post('street2');
        $data['update']['comp_city']=$this->input->get_post('city');
        $data['update']['comp_province']=$this->input->get_post('province');
        $data['update']['comp_country']=$this->input->get_post('country');
        $data['update']['comp_description']=$this->input->get_post('description');
        $data['update']['comp_postal_code']=$this->input->get_post('postal');
        $this->load->model("Company_Model","company");
        $ret=$this->company->update_profile($id,$data['update']);
        if($ret==1){
            redirect(base_url('admin/Manage_Company'));
        }
        else{
            $data['company']=$this->company->select_by_id($id);
            redirect(base_url('admin/Manage_Company/edit')."/".$id);  
        }

    }
    
    function add(){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->view('admin/add_company_view',array('data'=>$data));
    }
    
    function insert(){
        
        $this->form_validation->set_rules('website', 'Website', 'callback_website_check');
        
        if ($this->form_validation->run() == FALSE)
        {
            
                $data['user']=$this->session->userdata('logged_in');
                $this->load->view('admin/add_company_view',array('data'=>$data));
        }
        else
        {
            $data['insert']['comp_name']=$this->input->get_post('name');
            $data['insert']['comp_email']=$this->input->get_post('email');
            $data['insert']['comp_phone']=$this->input->get_post('phone');
            $data['insert']['comp_website']=$this->input->get_post('website');
            $data['insert']['comp_street1']=$this->input->get_post('street1');
            $data['insert']['comp_street2']=$this->input->get_post('street2');
            $data['insert']['comp_city']=$this->input->get_post('city');
            $data['insert']['comp_province']=$this->input->get_post('province');
            $data['insert']['comp_country']=$this->input->get_post('country');
            $data['insert']['comp_description']=$this->input->get_post('description');
            $data['insert']['comp_postal_code']=$this->input->get_post('postal');
            $this->load->model('Company_Model','company');
            $ret=$this->company->insert($data['insert']);
            if($ret==1){
                redirect(base_url('admin/Manage_Company'));
            }
            else{
                redirect(base_url('admin/Manage_Company/add'));  
            }
        }    
    }
    
    function delete($id){
        $this->load->model("Company_Model","company");
        $ret=$this->company->remove($id);
        if($ret==1){
            redirect(base_url('admin/Success'));  
        }
        else{
            $this->load->view('login_view');
        }
    }
    
    function website_check(){
        $this->load->model('Company_Model','company');
        $data['company']=$this->company->select_by_website($this->input->get_post('website'));
        if($data['company']['count']==0){
            return TRUE;
        } else {
            $this->form_validation->set_message('website_check', 'Company already exist.');
            return FALSE;
        }
    }
    
    
    function login(){
         redirect(base_url('admin/Login'), 'refresh');
    }
}
