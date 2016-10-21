<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of c_verifylogin
 *
 * @author adity
 */
class C_Verifylogin extends CI_Controller{
    //put your code here
    var $type;
    function __construct() {
        parent::__construct();
        $this->load->model('M_Login','login',TRUE);
        $this->load->helper(array('form', 'url','html'));
        $this->load->library(array('form_validation','session'));
        
    }
            
    function index(){
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
        if($this->form_validation->run() == FALSE) {
            $this->load->view('/login_view');
            //$this->load->view('login_view');
        } 
        else {    
            //Go to private area
            redirect(base_url('student/Dashboard'), 'refresh');
        }       
     }
 
     function check_database($password) {
         //Field validation succeeded.  Validate against database
         $username = $this->input->post('username');
         //query the database
         $result = $this->login->login($username, $password, 1);
         if($result) {
             //print_r($result);
            $sess_array = array();
            foreach($result as $row) {
                 //create the session
                switch ($row->stu_status){
                    case "enable":
                        $sess_array = array(
                            'user_id' => $row->stu_num,
                            'user_type' => "student",
                            'user_username' => $row->stu_num,
                            'user_name' => $row->stu_fname." ".$row->stu_lname,
                            );
                        $this->session->set_userdata('logged_in', $sess_array);
                        break;
                    case "disable":
                        $this->form_validation->set_message('check_database', 'Your account has been disabled. Please contact administrator.');
                        return FALSE;
                        break;
                    default :
                        $this->form_validation->set_message('check_database', '* Invalid Username or Password.');
                        return FALSE;
                        break;

                }
            }
        } else {
            //if form validate false
            $this->form_validation->set_message('check_database', '* Invalid username or password');
            return FALSE;
        }
    }
}