<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Certificate_Model
 *
 * @author adity
 */
class Certification_Model extends CI_Model{
    //put your code here
    function insert($data){
        $q=$this->db->insert('certification',$data);
        return $q;
    }
    
    function select_by_id($id){
        $q=$this->db->select('*')
                ->from('certification')
                ->where('cert_id',$id)
                ->get();
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data['cert_name']=$row->cert_name;
                $data['cert_body']=$row->cert_body;
                $data['cert_status']=$row->cert_status;
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
                ->from('certification')
                ->get();
        $i=0;
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[$i]['cert_id']= $row->cert_id;
                $data[$i]['cert_name']=$row->cert_name;
                $data[$i]['cert_body']=$row->cert_body;
                $data[$i]['cert_status']=$row->cert_status;
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
    
    function update($data,$id){
        $q=$this->db->where('cert_id',$id)
                ->update('certification',$data);
        return $q;
    }
    
}
