<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_login
 *
 * @author adity
 */
class M_Login extends CI_Model{
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function login($username,$password, $type){
        //create query to connect user login database
        switch($type){
            case 1:
                $this->db->select('*')
                    ->from('student')
                    ->where('stu_num',$username)
                    ->where('stu_password',  md5($password))
                    ->limit(1);
                    
                    //get query and processing
                    $query = $this->db->get();
                    if($query->num_rows()==1){
                        return $query->result(); // if valid user is found.
                    }else{
                        return false; // if no user found.
                    }
                break;
            case 2:
                $this->db->select('*')
                    ->from('admin')
                    ->where('admin_username',$username)
                    ->where('admin_password',  md5($password))
                    ->limit(1);
                    
                    //get query and processing
                    $query = $this->db->get();
                    if($query->num_rows()==1){
                        return $query->result(); // if valid user is found.
                    }else{
                        return false; // if no user found.
                    }
                break;
            default:
                return false;
        }
        
    }
}
