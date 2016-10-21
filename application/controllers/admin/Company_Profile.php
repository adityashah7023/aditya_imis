<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Company_Profile
 *
 * @author adity
 */
class Company_Profile extends CI_Controller{
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
    }
    
    function index($param){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model('Company_Model','company');
        $data['company']=$this->company->select_by_id($param);
        $this->load->model('Job_Model','job');
        $data['job']=$this->job->select_by_comp_id($param);
        $this->load->view('admin/company_profile_view',array('data'=>$data));
    }
}
