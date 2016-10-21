<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Skill_Type_Model
 *
 * @author adity
 */
class Skill_Type_Model extends CI_Model{
    //put your code here
    function insert($data){
        $q=$this->db->insert('skill_type',$data);
        return $q;
    }
    
    function select_by_id($id){
        $q=$this->db->select('*')
                ->from('skill_type')
                ->where('sktyp_id',$id)
                ->get();
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data['sktyp_id']=$row->sktyp_id;
                $data['sktyp_name']=$row->sktyp_name;
                $data['sktyp_status']=$row->sktyp_status;
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
                ->from('skill_type')
                ->get();
        $i=0;
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[$i]['sktyp_id']=$row->sktyp_id;
                $data[$i]['sktyp_name']=$row->sktyp_name;
                $data[$i]['sktyp_status']=$row->sktyp_status;
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
        $q=$this->db->where('sktyp_id',$id)
                ->update('skill_type',$data);
        return $q;
    }
    
    function remove($id){
        $data = array(
               'sktyp_status' => "disable"
            );
        $q=$this->db->where('sktyp_id',$id)
                ->update('skill_type',$data);
        return $q;
    }
}
