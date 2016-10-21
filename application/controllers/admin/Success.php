<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of success
 *
 * @author adity
 */
class Success extends CI_Controller{
    //put your code here
    
    function index(){
        $this->load->view('admin/success_view');
    }
}
