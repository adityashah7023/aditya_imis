<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student_Job_Interest_Model
 *
 * @author adity
 */
class Student_Job_Interest_Model extends CI_Model{
    //put your code here
    function insert($data){
        $q=$this->db->insert('student_job_interest',$data);
        return $q;
    }
    
    function select_by_id($id){
        $this->load->model("Job_Model",'job');
        $this->load->model("Student_Model",'student');
        $q=$this->db->select('*')
                ->from('student_job_interest')
                ->where('stjin_id',$id)
                ->get();
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data['stjin_id']=$row->stjin_id;
                $data['stu_num']=$row->stu_num;
                $data['student']=$this->student->select_by_id($data['stu_num']);
                $data['job_id']=$row->job_id;
                $data['job']=$this->job->select_by_id($row->job_id);
                $data['stjin_verification_status']=$row->stjin_verification_status;
                $data['stjin_status']=$row->stjin_status;
                
            }
            $data['count']=1;
            return $data;
        }
        else{
            $data['count']=0;
            return $data;
        }
    }
    
    function select_by_stu_num($id){
        $this->load->model("Job_Model",'job');
        $q=$this->db->select('*')
                ->from('student_job_interest')
                ->where('stu_num',$id)
                ->where('stjin_status',"enable")
                ->get();
        $i=0;
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[$i]['stjin_id']=$row->stjin_id;
                $data[$i]['job_id']=$row->job_id;
                $data[$i]['job']=$this->job->select_by_id($row->job_id);
                $data[$i]['stjin_verification_status']=$row->stjin_verification_status;
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
    
    function select_by_job_id($id){
        $this->load->model("Student_Model",'student');
        $this->load->model("Student_Skill_Model",'student_skill');
        $q=$this->db->select('*')
                ->from('student_job_interest')
                ->where('job_id',$id)
                ->where('stjin_status',"enable")
                ->get();
        $i=0;
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[$i]['stjin_id']=$row->stjin_id;
                $data[$i]['stu_num']=$row->stu_num;
                $data[$i]['job_id']=$row->job_id;
                $data[$i]['student']=$this->student->select_by_id($data[$i]['stu_num']);
                $data[$i]['student_skill']=$this->student_skill->select_by_stu_num($data[$i]['stu_num']);
                $data[$i]['stjin_verification_status']=$row->stjin_verification_status;
                $data[$i]['stjin_status']=$row->stjin_status;
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
    
    function select_by_stu_num_job_id($id,$job_id){
        $q=$this->db->select('*')
                ->from('student_job_interest')
                ->where('stu_num',$id)
                ->where('job_id',$job_id)
                ->where('stjin_status',"enable")
                ->get();
        $i=0;
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[$i]['stjin_id']=$row->stjin_id;
                $data[$i]['job_id']=$row->job_id;
                $data[$i]['stjin_verification_status']=$row->stjin_verification_status;
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
    
    function select_by_stu_num_detailed($id){
        $this->load->model('Job_Model','job');
        $q=$this->db->select('*')
                ->from('student_job_interest')
                ->where('stu_num',$id)
                ->get();
        $i=0;
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[$i]['job']=$this->job->select_by_id($row->job_id);
                $data[$i]['stjin_id']=$row->stjin_id;
                $data[$i]['job_id']=$row->job_id;
                $data[$i]['stjin_verification_status']=$row->stjin_verification_status;
                $data[$i]['stjin_status']=$row->stjin_status;
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
    
    function update_verification_status($data,$id){
        $q=$this->db->where('stjin_id',$id)
                ->update('student_job_interest',$data);
        return $q;
    }
}
