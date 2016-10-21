<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student_Education_Model
 *
 * @author adity
 */
class Student_Education_Model extends CI_Model{
    //put your code here
    function insert($data){
        $q=$this->db->insert('student_education',$data);
        return $q;
    }
    
    function select_by_stu_num($id){
        $q=$this->db->select('*')
                ->from('student_education')
                ->where('stu_num',$id)
                ->get();
        $i=0;
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[$i]['sted_id']=$row->sted_id;
                $data[$i]['sted_degree_name']=$row->sted_degree_name;
                $data[$i]['sted_uni_name']=$row->sted_uni_name;
                $data[$i]['sted_uni_city']=$row->sted_uni_city;
                $data[$i]['sted_major']=$row->sted_major;
                $data[$i]['sted_start_year']=$row->sted_start_year;
                $data[$i]['sted_end_year']=$row->sted_end_year;
                $data[$i]['sted_gpa']=$row->sted_gpa;
                $data[$i]['sted_status']=$row->sted_status;
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
                ->update('student_education',$data);
        return $q;
    }
    
    function remove($id){
        $q=$this->db->where('sted_id',$id)
                ->delete('student_education');
        return $q;
    }
}
