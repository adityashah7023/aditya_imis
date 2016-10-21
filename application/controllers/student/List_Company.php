<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of List_Company
 *
 * @author palak
 */
class List_Company extends CI_Controller{
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
    }
    
    function index(){
        $data['user']=$this->session->userdata('logged_in') ;
        $this->load->model("Company_Model", "company");
        $data['company']=$this->company->select_all();
        $this->load->view("student/list_company_view", array('data'=>$data));
    }
    
    function view($id){
        echo "company details of ".$id;
    }
    
    function login(){
         redirect(base_url('Login'), 'refresh');
     }
}
