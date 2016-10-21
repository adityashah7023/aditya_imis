<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin_model
 *
 * @author adity
 */
class Admin_Model extends CI_Model{
    //put your code here
    function insert($data){
        $q=$this->db->insert('admin',$data);
        return $q;
    }
    
    function select_by_id($id){
        $q=$this->db->select('*')
                ->from('admin')
                ->where('admin_id',$id)
                ->get();
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data['admin_username']=$row->admin_username;
                $data['admin_name']=$row->admin_name;
                $data['admin_email']=$row->admin_email;
                $data['admin_contact']=$row->admin_contact_no;
            }
            $data['count']=1;
            return $data;
        }
        else{
            $data['count']=0;
            return $data;
        }
    }
    
    function select_by_username($username){
        $q=$this->db->select('*')
                ->from('admin')
                ->where('admin_username',$username)
                ->get();
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data['admin_username']=$row->admin_username;
                $data['admin_name']=$row->admin_name;
                $data['admin_email']=$row->admin_email;
                $data['admin_contact']=$row->admin_contact_no;
            }
            $data['count']=1;
            return $data;
        }
        else{
            $data['count']=0;
            return $data;
        }
    }
    
    function select_all(){
        $q=$this->db->select('*')
                ->from('admin')
                ->get();
        $i=0;
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[$i]['admin_id']=$row->admin_id;
                $data[$i]['admin_username']=$row->admin_username;
                $data[$i]['admin_name']=$row->admin_name;
                $data[$i]['admin_email']=$row->admin_email;
                $data[$i]['admin_contact']=$row->admin_contact_no;
                $data[$i]['admin_status']=$row->admin_status;
                $i++;
            }
            $data['count']=$i;
            return $data;
        }
        else{
            $data['count']=0;
            return $data;
        }
    }
    
    function update_profile($id,$data){
        $q=$this->db->where('admin_id',$id)
                ->update('admin',$data);
        return $q;
    }
    
    function remove($id){
        $data = array(
               'admin_status' => "disable"
            );
        $q=$this->db->where('admin_id',$id)
                ->update('admin',$data);
        return $q;
    }
        
}
