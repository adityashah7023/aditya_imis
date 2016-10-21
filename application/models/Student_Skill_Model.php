<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student_Skill_Model
 *
 * @author adity
 */
class Student_Skill_Model extends CI_Model{
    //put your code here
        function insert($data){
        $q=$this->db->insert('student_skill',$data);
        return $q;
    }
    
    function select_by_stu_num($id){
        $this->load->model('Skill_Model','skill');
        $q=$this->db->select('*')
                ->from('student_skill')
                ->where('stu_num',$id)
                ->get();
        $i=0;
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[$i]['stsk_id']=$row->stsk_id;
                $data[$i]['skill']=$this->skill->select_by_id($row->skill_id);
                $data[$i]['skill_id']=$row->skill_id;
                $data[$i]['stsk_points']=$row->stsk_points;
                $data[$i]['stsk_status']=$row->stsk_status;
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
        $q=$this->db->where('stsk_id',$id)
                ->update('student_skill',$data);
        return $q;
    }
    
    function remove($id){
        $q=$this->db->where('stsk_id',$id)
                ->delete('student_skill');
        return $q;
    }
}
