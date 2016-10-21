<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Skill
 *
 * @author adity
 */
class Skill extends CI_Controller{
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
        if($data['user']['user_type']!="student"){ show_404(); }
    }
    
    function index(){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model('Skill_Model','skill');
        $data['skill']=$this->skill->select_all();
        $this->load->model('Student_Skill_Model','student_skill');
        $data['student_skill']=$this->student_skill->select_by_stu_num($data['user']['user_id']);
        $this->load->view('student/list_student_skill_view',array('data'=>$data));
    }
    
    function add(){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model('Skill_Model','skill');
        $data['skill']=$this->skill->select_all();
        $this->load->model('Student_Skill_Model','student_skill');
        $data['student_skill']=$this->student_skill->select_by_stu_num($data['user']['user_id']);
        $this->load->view('student/add_student_skill_view',array('data'=>$data));
    }
    
    function insert(){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model("Student_Skill_Model","skill");
        for($i=1;$i<=$this->input->get_post('count');$i++){
            $data['insert']['stu_num']=$data['user']['user_id'];
            $data['insert']['skill_id']=$this->input->get_post('id'.$i);
            $data['insert']['stsk_points']=$this->input->get_post('skill'.$data['insert']['skill_id']);
            
            $this->skill->insert($data['insert']);          
        }
        
        redirect(base_url('student/Skill'));
    }
    
    function delete($id){
        $this->load->model('Student_Skill_Model','skill');
        $ret=$this->skill->remove($id);
        
        if($ret==1){
            redirect(base_url('student/Success'));  
        }
        else{
            $this->load->view('login_view');
        }
    }
            
    function login(){
         redirect(base_url('Login'), 'refresh');
     }

}
