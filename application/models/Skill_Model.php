<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Skill_Model
 *
 * @author adity
 */
class Skill_Model extends CI_Model{
    //put your code here
    function insert($data){
        $q=$this->db->insert('skill',$data);
        return $q;
    }
    
    function select_all(){
        $this->load->model('Skill_Type_Model','skill_type');
        $q=$this->db->select('*')
                ->from('skill')
                ->get();
        $i=0;
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[$i]['skill_type']= $this->skill_type->select_by_id($row->sktyp_id);
                $data[$i]['skill_id']=$row->skill_id;
                $data[$i]['skill_name']=$row->skill_name;
                $data[$i]['skill_status']=$row->skill_status;
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
    
    function select_by_id($id){
        $this->load->model('Skill_Type_Model','skill_type');
        $q=$this->db->select('*')
                ->from('skill')
                ->where('skill_id',$id)
                ->get();
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data['skill_type']= $this->skill_type->select_by_id($row->sktyp_id);
                $data['skill_id']=$row->skill_id;
                $data['skill_name']=$row->skill_name;
                $data['skill_status']=$row->skill_status;
            }
            $data['count']=1;
            return $data;
        }
        else{
            $data['count']=0;
            return $data;
        }
    }
    
    function update($data,$id){
        $q=$this->db->where('skill_id',$id)
                ->update('skill',$data);
        return $q;
    }
    
    function remove($id){
        $data = array(
               'skill_status' => "disable"
            );
        $q=$this->db->where('skill_id',$id)
                ->update('skill',$data);
        return $q;
    }
}
