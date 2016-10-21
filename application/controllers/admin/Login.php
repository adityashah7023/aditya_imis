<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author adity
 */
class Login extends CI_Controller{
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper(array('form','html'));
        $this->load->library(array('form_validation','session'));
    }
    
    function index(){
        $session_data = $this->session->userdata('logged_in');
        //remove all session data
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        
        $this->load->view("admin/login_view");
    }
}
