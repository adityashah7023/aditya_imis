<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Internship_Type_Model
 *
 * @author adity
 */
class Internship_Type_Model extends CI_Model{
    //put your code here
    function select_by_id($id){
        $q=$this->db->select('*')
                ->from('internship_type')
                ->where('intp_id',$id)
                ->get();
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data['intp_id']=$row->intp_id;
                $data['intp_name']=$row->intp_name;
                $data['intp_status']=$row->intp_status;
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
                ->from('internship_type')
                ->get();
        $i=0;
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[$i]['intp_id']=$row->intp_id;
                $data[$i]['intp_name']=$row->intp_name;
                $data[$i]['intp_status']=$row->intp_status;
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
}
