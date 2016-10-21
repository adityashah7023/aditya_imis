<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Job_Group_Model
 *
 * @author adity
 */
class Job_Group_Model extends CI_Model{
    //put your code here
    function select_by_id($id){
        $q=$this->db->select('*')
                ->from('job_group')
                ->where('jbgrp_id',$id)
                ->get();
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data['jbgrp_id']=$row->jbgrp_id;
                $data['jbgrp_name']=$row->jbgrp_name;
                $data['jbgrp_status']=$row->jbgrp_status;
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
                ->from('job_group')
                ->get();
        $i=0;
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[$i]['jbgrp_id']=$row->jbgrp_id;
                $data[$i]['jbgrp_name']=$row->jbgrp_name;
                $data[$i]['jbgrp_status']=$row->jbgrp_status;
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
