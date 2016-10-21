<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student_Certification_Model
 *
 * @author adity
 */
class Student_Certification_Model extends CI_Model{
    //put your code here
    function insert($data){
        $q=$this->db->insert('student_certification',$data);
        return $q;
    }
    
    function select_all(){
        $this->load->model('Certification_Model','certification');
        $q=$this->db->select('*')
                ->from('student_certification')
                ->where('stu_num',$id)
                ->get();
        $i=0;
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[$i]['certification']= $this->certification->select_by_id($row->cert_id);
                $data[$i]['stce_id']=$row->stce_id;
                $data[$i]['stce_received_date']=$row->stce_received_date;
                $data[$i]['stce_status']=$row->stce_status;
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
    
    function select_by_stu_num($id){
        $this->load->model('Certification_Model','certification');
        $q=$this->db->select('*')
                ->from('student_certification')
                ->where('stu_num',$id)
                ->get();
        $i=0;
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[$i]['certification']= $this->certification->select_by_id($row->cert_id);
                $data[$i]['cert_id']=$row->cert_id;
                $data[$i]['stce_id']=$row->stce_id;
                $data[$i]['stce_received_date']=$row->stce_received_date;
                $data[$i]['stce_status']=$row->stce_status;
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
        $q=$this->db->where('stce_id',$id)
                ->update('student_certification',$data);
        return $q;
    }
    
    function remove($id){
        $q=$this->db->where('stce_id',$id)
                ->delete('student_certification');
        return $q;
    }
}
