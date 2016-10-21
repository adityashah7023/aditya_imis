<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of student_model
 *
 * @author adity
 */
class Student_Model extends CI_Model{
    //put your code here
    function insert($data){
        $q=$this->db->insert('student',$data);
        return $q;
    }
    
    function select_by_id($id){
        $q=$this->db->select('*')
                ->from('student')
                ->where('stu_num',$id)
                ->get();
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data['stu_num']=$row->stu_num;
                $data['stu_fname']=$row->stu_fname;
                $data['stu_mname']=$row->stu_mname;
                $data['stu_lname']=$row->stu_lname;
                $data['stu_email']=$row->stu_email;
                $data['stu_gender']=$row->stu_gender;
                $data['stu_nationality']=$row->stu_nationality;
                $data['stu_internship_status']=$row->stu_internship_status;
                $data['stu_contact_no']=$row->stu_contact_no;
                $data['stu_semester']=$row->stu_semester;
                $data['stu_intake_year']=$row->stu_intake_year;
                $data['stu_intake_term']=$row->stu_intake_term;
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
                ->from('student')
                ->get();
        $i=0;
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[$i]['stu_num']=$row->stu_num;
                $data[$i]['stu_fname']=$row->stu_fname;
                $data[$i]['stu_mname']=$row->stu_mname;
                $data[$i]['stu_lname']=$row->stu_lname;
                $data[$i]['stu_email']=$row->stu_email;
                $data[$i]['stu_gender']=$row->stu_gender;
                $data[$i]['stu_nationality']=$row->stu_nationality;
                $data[$i]['stu_internship_status']=$row->stu_internship_status;
                $data[$i]['stu_contact_no']=$row->stu_contact_no;
                $data[$i]['stu_semester']=$row->stu_semester;
                $data[$i]['stu_intake_year']=$row->stu_intake_year;
                $data[$i]['stu_intake_term']=$row->stu_intake_term;
                $data[$i]['stu_status']=$row->stu_status;
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
    
    function update_student($id,$data){
        $q=$this->db->where('stu_num',$id)
                ->update('student',$data);
        return $q;
    }
    
    function remove($id){
        $data = array(
               'stu_status' => "disable"
            );
        $q=$this->db->where('stu_num',$id)
                ->update('student',$data);
        return $q;
    }

}
