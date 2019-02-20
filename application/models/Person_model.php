<?php

defined('BASEPATH') OR exit('No direct script access allowed');



/**

 *

 */
class Person_model extends CI_Model
{

    public function read($id)
    {

        $rs = $this->db
            ->where('a.id', $id)
            ->get('outsite_permit a')
            ->row();
        return $rs;
    }

    public function get_invit_type($id)
    {
        $rs = $this->db
            ->where('id', $id)
            ->limit(1)
            ->get('invit_type')
            ->row();
        //echo $this->db->last_query();
        return $rs ? $rs->invit_type : NULL;
    }

    public function get_user($id)
    {
        $rs = $this->db
            ->where('id', $id)
            ->limit(1)
            ->get('mas_users')
            ->row();
        //echo $this->db->last_query();
        return $rs ? $rs->prename . $rs->name : NULL;
    }

    public function get_position($id)
    {
        $rs = $this->db
            ->where('id', $id)
            ->limit(1)
            ->get('mas_users')
            ->row();
        //echo $this->db->last_query();
        return $rs ? $rs->position : 'xxxx';
    }

    public function  get_outsite_type()
    {
        $rs = $this->db
            ->get('outsite_type')
            ->result();
        //echo $this->db->last_query();
        return $rs;
    }

    public function  getAll_invit_type()
    {
        $rs = $this->db
            ->get('invit_type')
            ->result();
        //echo $this->db->last_query();
        return $rs;
    }

    public function  getAll_travel_type()
    {
        $rs = $this->db
            ->get('travel_type')
            ->result();
        //echo $this->db->last_query();
        return $rs;
    }

    public function get_user_id($id)
    {
        $rs = $this->db
            ->where('id', $id)
            ->limit(1)
            ->get('mas_users')
            ->row();
        //echo $this->db->last_query();
        return $rs;
    }

    public function get_outsite_by_user($id)
    {
        $rs = $this->db
            ->where('permit_user', $id)
            ->get('outsite_permit')
            ->result();
        //echo $this->db->last_query();
        return $rs;
    }

    public function getPerson_by_cid($txt_search,$hospcode){
        $rs = $this->hdc
            ->like('cid ',$txt_search)
            ->where('HOSPCODE',$hospcode)
            ->limit(50)
            ->get('t_person_cid')

            ->result();
        //echo $this->db->last_query();
        return $rs;
    }

    public function getPerson_by_name($txt_search,$hospcode){
        $txt = explode(" ",$txt_search);
        if(count($txt)==2){
            $txt_search = " ( NAME LIKE '%".$txt[0]."%' AND LNAME LIKE '%".$txt[1]."%') " ;
        }else if(count($txt)==3){
            $txt_search = "( NAME LIKE '%".$txt[0]."%' AND LNAME LIKE '%".$txt[2]."%') " ;
        }else{
            $txt_search = "( NAME LIKE '%".$txt_search."%' OR LNAME LIKE '%".$txt_search."%') ";
        }

        $rs = $this->hdc
            ->where('HOSPCODE',$hospcode)
            ->where($txt_search)
            ->limit(50)
            ->get('t_person_cid')
            ->result();
        //echo $this->db->last_query();
        return $rs;
    }
    public function getPatient_by_cid($txt_search,$hospcode){
        $rs = $this->db
            ->like('cid ',$txt_search)
            ->where('HOSPCODE',$hospcode)
            ->limit(50)
            ->get('t_person_cid')

            ->result();
        //echo $this->db->last_query();
        return $rs;
    }

    public function getPatient_by_name($txt_search,$hospcode){
        $txt = explode(" ",$txt_search);
        if(count($txt)==2){
            $txt_search = " ( NAME LIKE '%".$txt[0]."%' AND LNAME LIKE '%".$txt[1]."%') " ;
        }else if(count($txt)==3){
            $txt_search = "( NAME LIKE '%".$txt[0]."%' AND LNAME LIKE '%".$txt[2]."%') " ;
        }else{
            $txt_search = "( NAME LIKE '%".$txt_search."%' OR LNAME LIKE '%".$txt_search."%') ";
        }

        $rs = $this->db
            ->where('HOSPCODE',$hospcode)
            ->where($txt_search)
            ->limit(50)
            ->get('t_person_cid')
            ->result();
        //echo $this->db->last_query();
        return $rs;
    }
    public function import_person($cid,$hospcode){
        $sql = "INSERT INTO t_person_cid SELECT * FROM hdc.t_person_cid WHERE CID='".$cid."' AND HOSPCODE='".$hospcode."'";
        $rs = $this->db->query($sql);
        //echo $this->db->last_query();
        return $rs;
    }
        public function get_person($hoscpcode){
            $rs = $this->db
                ->where('HOSPCODE',$hoscpcode)
                ->order_by('vhid','addr','age_y')
                ->get('t_person_cid')
                ->result();
            return $rs;
        }
    public function del_person($cid,$hoscpcode){
            $rs = $this->db
                ->where('HOSPCODE',$hoscpcode)
                ->where('CID',$cid)
                ->delete('t_person_cid');
            return $rs;
        }

}
