<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Job_Skill_Model
 *
 * @author adity
 */
class Job_Skill_Model extends CI_Model{
    //put your code here
    function insert($data){
        $q=$this->db->insert('job_skill',$data);
        return $q;
    }
    
    function select_by_job_id($id){
        $this->load->model('Skill_Model','skill');
        $q=$this->db->select('*')
                ->from('job_skill')
                ->where('job_id',$id)
                ->get();
        $i=0;
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[$i]=$this->skill->select_by_id($row->skill_id);
                $data[$i]['jbsk_id']=$row->jbsk_id;
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
}
