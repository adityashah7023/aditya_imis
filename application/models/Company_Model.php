<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Company_Model
 *
 * @author adity
 */
class Company_Model extends CI_Model{
    //put your code here
    function insert($data){
        $q=$this->db->insert('company',$data);
        return $q;
    }
    
    function select_by_id($id){
        $q=$this->db->select('*')
                ->from('company')
                ->where('comp_id',$id)
                ->get();
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data['comp_name']=$row->comp_name;
                $data['comp_street1']=$row->comp_street1;
                $data['comp_street2']=$row->comp_street2;
                $data['comp_city']=$row->comp_city;
                $data['comp_province']=$row->comp_province;
                $data['comp_country']=$row->comp_country;
                $data['comp_website']=$row->comp_website;
                $data['comp_email']=$row->comp_email;
                $data['comp_phone']=$row->comp_phone;
                $data['comp_description']=$row->comp_description;
                $data['comp_postal_code']=$row->comp_postal_code;
                $data['comp_status']=$row->comp_status;
            }
            $data['count']=1;
            return $data;
        }
        else{
            $data['count']=0;
            return $data;
        }
    }
    
    function select_by_website($website){
        $q=$this->db->select('*')
                ->from('company')
                ->where('comp_website',$website)
                ->where('comp_status','enable')
                ->get();
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data['comp_id']=$row->comp_id;
                $data['comp_name']=$row->comp_name;
                $data['comp_street1']=$row->comp_street1;
                $data['comp_street2']=$row->comp_street2;
                $data['comp_city']=$row->comp_city;
                $data['comp_province']=$row->comp_province;
                $data['comp_country']=$row->comp_country;
                $data['comp_id']=$row->comp_id;
                $data['comp_email']=$row->comp_email;
                $data['comp_phone']=$row->comp_phone;
                $data['comp_description']=$row->comp_description;
                $data['comp_postal_code']=$row->comp_postal_code;
                $data['comp_status']=$row->comp_status;
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
                ->from('company')
                ->get();
        $i=0;
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[$i]['comp_id']=$row->comp_id;
                $data[$i]['comp_name']=$row->comp_name;
                $data[$i]['comp_street1']=$row->comp_street1;
                $data[$i]['comp_street2']=$row->comp_street2;
                $data[$i]['comp_city']=$row->comp_city;
                $data[$i]['comp_province']=$row->comp_province;
                $data[$i]['comp_country']=$row->comp_country;
                $data[$i]['comp_website']=$row->comp_website;
                $data[$i]['comp_email']=$row->comp_email;
                $data[$i]['comp_phone']=$row->comp_phone;
                $data[$i]['comp_description']=$row->comp_description;
                $data[$i]['comp_postal_code']=$row->comp_postal_code;
                $data[$i]['comp_status']=$row->comp_status;
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
        $q=$this->db->where('comp_id',$id)
                ->update('company',$data);
        return $q;
    }
    
    function remove($id){
        $data = array(
               'comp_status' => "disable"
            );
        $q=$this->db->where('comp_id',$id)
                ->update('company',$data);
        return $q;
    }
}
