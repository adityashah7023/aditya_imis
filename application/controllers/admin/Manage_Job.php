<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Manage_Job
 *
 * @author adity
 */
class Manage_Job extends CI_Controller{
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
        $this->load->model('Job_Model','job');
        $data['job']=$this->job->select_all();
        $this->load->view('admin/list_job_view',array('data'=>$data));
    }
    
    function edit($id){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model('Company_Model','company');
        $this->load->model('Internship_Type_Model','internship_type');
        $this->load->model('Job_Group_Model','job_group');
        $this->load->model('Skill_Model','skill');
        $this->load->model('Skill_Type_Model','skill_type');
        
        $data['skill']=$this->skill->select_all();
        $data['skill_type']=$this->skill_type->select_all();
        $data['company']=$this->company->select_all();
        $data['internship_type']=$this->internship_type->select_all();
        $data['job_group']=$this->job_group->select_all();
        
        $this->load->model('Job_Model','job');
        $data['job']=$this->job->select_by_id($id);
        $data['job']['job_id']=$id;
        $this->load->view('admin/update_job_view',array('data'=>$data));
    }
    
    function update($id){
        
        $data['update']['comp_id']=$this->input->get_post('company');
        $data['update']['intp_id']=$this->input->get_post('internship_type');
        $data['update']['job_position']=$this->input->get_post('position');
        $data['update']['job_description']=$this->input->get_post('description');
        $data['update']['job_responsibilities']=$this->input->get_post('responsibilities');
        $data['update']['job_requirements']=$this->input->get_post('requirements');
        $data['update']['job_openings']=$this->input->get_post('openings');
        $data['update']['job_salary']=$this->input->get_post('salary');
        $data['update']['job_pay_status']=$this->input->get_post('pay_status');
        $data['update']['job_application_deadline']=$this->input->get_post('application_deadline');
        $data['update']['jbgrp_id']=$this->input->get_post('job_group');
        $data['update']['job_contact_fname']=$this->input->get_post('c_fname');
        $data['update']['job_contact_lname']=$this->input->get_post('c_lname');
        $data['update']['job_contact_position']=$this->input->get_post('c_position');
        $data['update']['job_contact_phone']=$this->input->get_post('c_phone');
        $data['update']['job_contact_email']=$this->input->get_post('c_email');
        $this->load->model('Job_Model','job');
        print_r($data['update']);
        $ret=$this->job->update_profile($id,$data['update']);
        if($ret==1){
            redirect(base_url('admin/Manage_Job'));
        }
        else{
            $data['job']=$this->job->select_by_id($id);
            redirect(base_url('admin/Manage_Job/edit')."/".$id);  
        }

    }
    
    function add_company(){
        $data['user']=$this->session->userdata('logged_in');
    
        $this->load->view('admin/add_company_from_job_view',array('data'=>$data));
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
    
    function insert_company(){
        
        $this->form_validation->set_rules('website', 'Website', 'callback_website_check');
        
        if ($this->form_validation->run() == FALSE)
        {
            
                $data['user']=$this->session->userdata('logged_in');
                $this->load->view('admin/add_company_from_job_view',array('data'=>$data));
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
                redirect(base_url('admin/Manage_Job/add'));
            }
            else{
                redirect(base_url('admin/Manage_Job/add'));  
            }
        }    
    }
    
    function add_group(){
            $data['user']=$this->session->userdata('logged_in');
    
        $this->load->view('admin/add_group_from_job_view',array('data'=>$data));
    }
    
    function add_internship_type(){
            $data['user']=$this->session->userdata('logged_in');
    
        $this->load->view('admin/add_internship_type_from_job_view',array('data'=>$data));
    }
            
    function add(){
        $this->load->model('Company_Model','company');
        $this->load->model('Internship_Type_Model','internship_type');
        $this->load->model('Job_Group_Model','job_group');
        $this->load->model('Skill_Model','skill');
        $this->load->model('Skill_Type_Model','skill_type');
        
        $data['skill']=$this->skill->select_all();
        $data['skill_type']=$this->skill_type->select_all();
        $data['company']=$this->company->select_all();
        $data['internship_type']=$this->internship_type->select_all();
        $data['job_group']=$this->job_group->select_all();
        
        $data['user']=$this->session->userdata('logged_in');
        $this->load->view('admin/add_job_view',array('data'=>$data));
    }
    
    function insert(){
        
        $data['insert']['comp_id']=$this->input->get_post('company');
        $data['insert']['intp_id']=$this->input->get_post('internship_type');
        $data['insert']['job_position']=$this->input->get_post('position');
        $data['insert']['job_description']=$this->input->get_post('description');
        $data['insert']['job_responsibilities']=$this->input->get_post('responsibilities');
        $data['insert']['job_requirements']=$this->input->get_post('requirements');
        $data['insert']['job_openings']=$this->input->get_post('openings');
        $data['insert']['job_salary']=$this->input->get_post('salary');
        $data['insert']['job_pay_status']=$this->input->get_post('pay_status');
        $data['insert']['job_application_deadline']=$this->input->get_post('application_deadline');
        $data['insert']['jbgrp_id']=$this->input->get_post('job_group');
        $data['insert']['job_contact_fname']=$this->input->get_post('c_fname');
        $data['insert']['job_contact_lname']=$this->input->get_post('c_lname');
        $data['insert']['job_contact_position']=$this->input->get_post('c_position');
        $data['insert']['job_contact_phone']=$this->input->get_post('c_phone');
        $data['insert']['job_contact_email']=$this->input->get_post('c_email');
        $this->load->model('Job_Model','job');
        $ret=$this->job->insert($data['insert']);
        if($ret==1){
            $this->add_job_skill();
            redirect(base_url('admin/Manage_Job'));
        }
        else{
            redirect(base_url('admin/Manage_Job/add'));  
        }
    }
    
    function add_job_skill(){
        $this->load->model("Job_Model","job");
        $this->load->model("Job_Skill_Model","job_skill");
        
        $data['job']=$this->job->select_latest_job();
        $data['skill']=$this->input->get_post('skill');
        
        for($i=0;$i<count($data['skill']);$i++){
            $data['insert']['skill_id']=$data['skill'][$i];
            $data['insert']['job_id']=$data['job']['job_id'];
            
            $this->job_skill->insert($data['insert']);
        }
    }
    
    function delete($id){
        $this->load->model("Job_Model","job");
        $ret=$this->job->remove($id);
        if($ret==1){
            redirect(base_url('admin/Success'));  
        }
    }
    
    function login(){
         redirect(base_url('admin/Login'), 'refresh');
     }

}
