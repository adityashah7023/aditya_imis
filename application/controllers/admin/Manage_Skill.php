<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Manage_Skill
 *
 * @author adity
 */
class Manage_Skill extends CI_Controller{
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
        $this->load->model("Skill_Model","skill");
        $data['skill']=$this->skill->select_all();
        $this->load->view('admin/list_skill_view',array('data'=>$data));
    }
    
    function skill_type(){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model("Skill_Type_Model","skill_type");
        $data['skill_type']=$this->skill_type->select_all();
        $this->load->view('admin/list_skill_type_view',array('data'=>$data));
    }
    
    function add(){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model("Skill_Type_Model","skill_type");
        $data['skill_type']=$this->skill_type->select_all();
        $this->load->view('admin/add_skill_view',array('data'=>$data));
    }
    
    function insert(){
        $data['insert']['skill_name']=$this->input->get_post("name");
        $data['insert']['sktyp_id']=$this->input->get_post("type");
        $data['insert']['skill_status']="enable";
        
        $this->load->model("Skill_Model","skill");
        $q=$this->skill->insert($data['insert']);
        if($q==1)
            redirect (base_url("admin/Manage_Skill"));
        else
            redirect (base_url ("admin/Manage_Skill/add"));
    }
    
    function edit($id){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model("Skill_Type_Model","skill_type");
        $data['skill_type']=$this->skill_type->select_all();
        $this->load->model("Skill_Model","skill");
        $data['skill']=$this->skill->select_by_id($id);
        $this->load->view('admin/update_skill_view',array('data'=>$data));
    }
    
    function update($id){
        $data['update']['skill_name']=$this->input->get_post("name");
        $data['update']['sktyp_id']=$this->input->get_post("type");
        
        $this->load->model("Skill_Model","skill");
        $q=$this->skill->update($data['update'],$id);
        if($q==1)
            redirect (base_url("admin/Manage_Skill"));
        else
            redirect (base_url ("admin/Manage_Skill/edit".$id));
    }
    
    function delete($id){
        $this->load->model("Skill_Model","skill");
        $ret=$this->skill->remove($id);
        if($ret==1){
            redirect(base_url('admin/Success'));  
        }
    }    
    
    function add_skill_type(){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->view('admin/add_skill_type_view',array('data'=>$data));
    }
    
    function insert_skill_type(){
        $data['insert']['sktyp_name']=$this->input->get_post("name");
        $data['insert']['sktyp_status']="enable";
        
        $this->load->model("Skill_Type_Model","skill_type");
        $q=$this->skill_type->insert($data['insert']);
        if($q==1)
            redirect (base_url("admin/Manage_Skill/add"));
        else
            redirect (base_url ("admin/Manage_Skill/add_skill_type"));
    }
    
    function edit_skill_type($id){
        $data['user']=$this->session->userdata('logged_in');
        $this->load->model("Skill_Type_Model","skill_type");
        $data['skill_type']=$this->skill_type->select_by_id($id);
        $this->load->view('admin/update_skill_type_view',array('data'=>$data));
    }
    
    function update_skill_type($id){
        $data['update']['sktyp_name']=$this->input->get_post("name");
        
        $this->load->model("Skill_Type_Model","skill_type");
        $q=$this->skill_type->update($data['update'],$id);
        if($q==1)
            redirect (base_url("admin/Manage_Skill/skill_type"));
        else
            redirect (base_url ("admin/Manage_Skill/edit_skill_type".$id));        
    }
    
    function delete_skill_type($id){
        $this->load->model("Skill_Type_Model","skill_type");
        $ret=$this->skill_type->remove($id);
        if($ret==1){
            redirect(base_url('admin/Success'));  
        }
    }
    
    function login(){
         redirect(base_url('admin/Login'), 'refresh');
     }

}
