<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student_Internship_Model
 *
 * @author adity
 */
class Student_Internship_Model extends CI_Model{
    //put your code here
    function insert($data){
        $q=$this->db->insert('student_internship',$data);
        return $q;
    }
    
    function select_by_stu_num($stu_num){
        $this->load->model("Job_Model",'job');
        $this->load->model("Student_Job_Interest_Model","stjin");
        $data1['stjin']=$this->stjin->select_by_stu_num($stu_num);
        for($j=0,$k=0;$j<$data1['stjin']['count'];$j++){
            $q=$this->db->select('*')
                    ->from('student_internship')
                    ->where('stjin_id',$data1['stjin'][$j]['stjin_id'])
                    ->where('stin_status',"enable")
                    ->get();
            if($q->num_rows()>0){
                foreach($q->result() as $row){
                    $data[$k]['stjin_id']=$row->stjin_id;
                    $data[$k]['job_id']=$data1['stjin'][$j]['job_id'];
                    $data[$k]['job']=$this->job->select_by_id($data[$k]['job_id']);
                    $data[$k]['stin_assigned_date']=$row->stin_assigned_date;
                    $data[$k]['stin_start_date']=$row->stin_start_date;
                    $data[$k]['stin_end_date']=$row->stin_end_date;
                    $k++;
                }
            }
        }
        if($data1['stjin']['count']==0){
            $data['count']=0;
            return $data;
        }
        else{
            $data['count']=$k;
            return $data;
        }
    }
    
    function select_by_job_id($job_id){
        $this->load->model("Student_Model",'student');
        $this->load->model("Student_Job_Interest_Model","stjin");
        $data1['stjin']=$this->stjin->select_by_job_id($job_id);
        for($j=0,$k=0;$j<$data1['stjin']['count'];$j++){
            $q=$this->db->select('*')
                    ->from('student_internship')
                    ->where('stjin_id',$data1['stjin'][$j]['stjin_id'])
                    ->where('stin_status',"enable")
                    ->get();
            if($q->num_rows()>0){
                foreach($q->result() as $row){
                    $data[$k]['stjin_id']=$row->stjin_id;
                    $data[$k]['stu_num']=$data1['stjin'][$j]['stu_num'];
                    $data[$k]['student']=$this->student->select_by_id($data[$k]['stu_num']);
                    $data[$k]['stin_assigned_date']=$row->stin_assigned_date;
                    $data[$k]['stin_start_date']=$row->stin_start_date;
                    $data[$k]['stin_end_date']=$row->stin_end_date;
                    $k++;
                }
            }
        }
        if($data1['stjin']['count']==0){
            $data['count']=0;
            return $data;
        }
        else{
            $data['count']=$k;
            return $data;
        }
    }
}
