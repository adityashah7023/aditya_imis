<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Job_Model
 *
 * @author adity
 */
class Job_Model extends CI_Model{
    //put your code here
    function insert($data){
        $q=$this->db->insert('job',$data);
        return $q;
    }
    
    function select_latest_job(){
        $this->load->model('Company_Model','company');
        $this->load->model('Internship_Type_Model','internship_type');
        $this->load->model('Job_Group_Model','job_group');
        $q=$this->db->select('*')
                ->from('job')
                ->order_by('job_id','desc')
                ->limit(1)
                ->get();
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data['company']= $this->company->select_by_id($row->comp_id);
                $data['internship_type']= $this->internship_type->select_by_id($row->intp_id);
                $data['job_group']= $this->job_group->select_by_id($row->jbgrp_id);
                $data['job_id']=$row->job_id;
                $data['comp_id']=$row->comp_id;
                $data['intp_id']=$row->intp_id;
                $data['job_position']=$row->job_position;
                $data['job_description']=$row->job_description;
                $data['job_responsibilities']=$row->job_responsibilities;
                $data['job_requirements']=$row->job_requirements;
                $data['job_openings']=$row->job_openings;
                $data['job_salary']=$row->job_salary;
                $data['job_pay_status']=$row->job_pay_status;
                $data['job_application_deadline']=$row->job_application_deadline;
                $data['jbgrp_id']=$row->jbgrp_id;
                $data['job_contact_fname']=$row->job_contact_fname;
                $data['job_contact_lname']=$row->job_contact_lname;
                $data['job_contact_position']=$row->job_contact_position;
                $data['job_contact_phone']=$row->job_contact_phone;
                $data['job_contact_email']=$row->job_contact_email;
                $data['job_status']=$row->job_status;
            }
            $data['count']=1;
            return $data;
        }
        else{
            $data['count']=0;
            return $data;
        }
    }
    
    function select_by_id($id){
        $this->load->model('Company_Model','company');
        $this->load->model('Internship_Type_Model','internship_type');
        $this->load->model('Job_Group_Model','job_group');
        $q=$this->db->select('*')
                ->from('job')
                ->where('job_id',$id)
                ->get();
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data['company']= $this->company->select_by_id($row->comp_id);
                $data['internship_type']= $this->internship_type->select_by_id($row->intp_id);
                $data['job_group']= $this->job_group->select_by_id($row->jbgrp_id);
                $data['comp_id']=$row->comp_id;
                $data['intp_id']=$row->intp_id;
                $data['job_position']=$row->job_position;
                $data['job_description']=$row->job_description;
                $data['job_responsibilities']=$row->job_responsibilities;
                $data['job_requirements']=$row->job_requirements;
                $data['job_openings']=$row->job_openings;
                $data['job_salary']=$row->job_salary;
                $data['job_pay_status']=$row->job_pay_status;
                $data['job_application_deadline']=$row->job_application_deadline;
                $data['jbgrp_id']=$row->jbgrp_id;
                $data['job_contact_fname']=$row->job_contact_fname;
                $data['job_contact_lname']=$row->job_contact_lname;
                $data['job_contact_position']=$row->job_contact_position;
                $data['job_contact_phone']=$row->job_contact_phone;
                $data['job_contact_email']=$row->job_contact_email;
                $data['job_status']=$row->job_status;
            }
            $data['count']=1;
            return $data;
        }
        else{
            $data['count']=0;
            return $data;
        }
    }
    
    function select_by_comp_id($id){
        $this->load->model('Company_Model','company');
        $this->load->model('Internship_Type_Model','internship_type');
        $this->load->model('Job_Group_Model','job_group');
        $q=$this->db->select('*')
                ->from('job')
                ->where('comp_id',$id)
                ->get();
        $i=0;
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[$i]['company']= $this->company->select_by_id($row->comp_id);
                $data[$i]['internship_type']= $this->internship_type->select_by_id($row->intp_id);
                $data[$i]['job_group']= $this->job_group->select_by_id($row->jbgrp_id);
                $data[$i]['job_id']=$row->job_id;
                $data[$i]['comp_id']=$row->comp_id;
                $data[$i]['intp_id']=$row->intp_id;
                $data[$i]['job_position']=$row->job_position;
                $data[$i]['job_description']=$row->job_description;
                $data[$i]['job_responsibilities']=$row->job_responsibilities;
                $data[$i]['job_requirements']=$row->job_requirements;
                $data[$i]['job_openings']=$row->job_openings;
                $data[$i]['job_salary']=$row->job_salary;
                $data[$i]['job_pay_status']=$row->job_pay_status;
                $data[$i]['job_application_deadline']=$row->job_application_deadline;
                $data[$i]['jbgrp_id']=$row->jbgrp_id;
                $data[$i]['job_contact_fname']=$row->job_contact_fname;
                $data[$i]['job_contact_lname']=$row->job_contact_lname;
                $data[$i]['job_contact_position']=$row->job_contact_position;
                $data[$i]['job_contact_phone']=$row->job_contact_phone;
                $data[$i]['job_contact_email']=$row->job_contact_email;
                $data[$i]['job_status']=$row->job_status;
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
    
    function select_all(){
        $this->load->model('Company_Model','company');
        $this->load->model('Internship_Type_Model','internship_type');
        $this->load->model('Job_Group_Model','job_group');
        $q=$this->db->select('*')
                ->from('job')
                ->get();
        $i=0;
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[$i]['company']= $this->company->select_by_id($row->comp_id);
                $data[$i]['internship_type']= $this->internship_type->select_by_id($row->intp_id);
                $data[$i]['job_group']= $this->job_group->select_by_id($row->jbgrp_id);
                $data[$i]['job_id']=$row->job_id;
                $data[$i]['comp_id']=$row->comp_id;
                $data[$i]['intp_id']=$row->intp_id;
                $data[$i]['job_position']=$row->job_position;
                $data[$i]['job_description']=$row->job_description;
                $data[$i]['job_responsibilities']=$row->job_responsibilities;
                $data[$i]['job_requirements']=$row->job_requirements;
                $data[$i]['job_openings']=$row->job_openings;
                $data[$i]['job_salary']=$row->job_salary;
                $data[$i]['job_pay_status']=$row->job_pay_status;
                $data[$i]['job_application_deadline']=$row->job_application_deadline;
                $data[$i]['jbgrp_id']=$row->jbgrp_id;
                $data[$i]['job_contact_fname']=$row->job_contact_fname;
                $data[$i]['job_contact_lname']=$row->job_contact_lname;
                $data[$i]['job_contact_position']=$row->job_contact_position;
                $data[$i]['job_contact_phone']=$row->job_contact_phone;
                $data[$i]['job_contact_email']=$row->job_contact_email;
                $data[$i]['job_status']=$row->job_status;
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
    
    function select_all_order_desc(){
        $this->load->model('Company_Model','company');
        $this->load->model('Internship_Type_Model','internship_type');
        $this->load->model('Job_Group_Model','job_group');
        $q=$this->db->select('*')
                ->order_by('job_application_deadline','desc')
                ->from('job')
                ->get();
        $i=0;
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[$i]['company']= $this->company->select_by_id($row->comp_id);
                $data[$i]['internship_type']= $this->internship_type->select_by_id($row->intp_id);
                $data[$i]['job_group']= $this->job_group->select_by_id($row->jbgrp_id);
                $data[$i]['job_id']=$row->job_id;
                $data[$i]['comp_id']=$row->comp_id;
                $data[$i]['intp_id']=$row->intp_id;
                $data[$i]['job_position']=$row->job_position;
                $data[$i]['job_description']=$row->job_description;
                $data[$i]['job_responsibilities']=$row->job_responsibilities;
                $data[$i]['job_requirements']=$row->job_requirements;
                $data[$i]['job_openings']=$row->job_openings;
                $data[$i]['job_salary']=$row->job_salary;
                $data[$i]['job_pay_status']=$row->job_pay_status;
                $data[$i]['job_application_deadline']=$row->job_application_deadline;
                $data[$i]['jbgrp_id']=$row->jbgrp_id;
                $data[$i]['job_contact_fname']=$row->job_contact_fname;
                $data[$i]['job_contact_lname']=$row->job_contact_lname;
                $data[$i]['job_contact_position']=$row->job_contact_position;
                $data[$i]['job_contact_phone']=$row->job_contact_phone;
                $data[$i]['job_contact_email']=$row->job_contact_email;
                $data[$i]['job_status']=$row->job_status;
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
    
    function update_profile($id,$data){
        $q=$this->db->where('job_id',$id)
                ->update('job',$data);
        return $q;
    }
    
    function remove($id){
        $data = array(
               'job_status' => "disable"
            );
        $q=$this->db->where('job_id',$id)
                ->update('job',$data);
        return $q;
    }
}
