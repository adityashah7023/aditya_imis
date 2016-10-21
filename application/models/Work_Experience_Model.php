<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Work_Experience_Model
 *
 * @author adity
 */
class Work_Experience_Model extends CI_Model{
    //put your code here
    function insert($data){
        $q=$this->db->insert('work_experience',$data);
        return $q;
    }
    
    function select_by_stu_num($id){
        $q=$this->db->select('*')
                ->from('work_experience')
                ->where('stu_num',$id)
                ->get();
        $i=0;
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[$i]['woex_id']=$row->woex_id;
                $data[$i]['woex_company_name']=$row->woex_company_name;
                $data[$i]['woex_company_location']=$row->woex_company_location;
                $data[$i]['woex_position']=$row->woex_position;
                $data[$i]['woex_duties']=$row->woex_duties;
                $data[$i]['woex_from_year']=$row->woex_from_year;
                $data[$i]['woex_to_year']=$row->woex_to_year;
                $data[$i]['woex_status']=$row->woex_status;
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
        $q=$this->db->where('sted_id',$id)
                ->update('work_experience',$data);
        return $q;
    }
    
    function remove($id){
        $q=$this->db->where('woex_id',$id)
                ->delete('work_experience');
        return $q;
    }
}
