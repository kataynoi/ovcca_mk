<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Question_model extends CI_Model
{

    public function read($id)
    {

        $rs = $this->db
            ->where('a.group_id', $id)
            ->get('question a')
            ->result();
        return $rs;
    }

    public function get_answer($id)
    {
        $rs = $this->db
            ->where('question_id', $id)
            ->get('answer')
            ->result();
        return $rs;
    }
    public  function  get_demo_history_question($cid,$hospcode){
     $rs= $this->db
         ->where('cid',$cid)
         ->where('hospcode',$hospcode)
         ->get('demographic')
         ->result_array();
        return $rs;
    }
    public  function  get_kato_history_question($cid,$hospcode){
     $rs= $this->db
         ->where('cid',$cid)
         ->where('hospcode',$hospcode)
         ->get('kato')
         ->result_array();
        return $rs;
    }
    public  function  get_ultrasound_history_question($cid,$hospcode){
     $rs= $this->db
         ->where('cid',$cid)
         ->where('hospcode',$hospcode)
         ->get('ultrasound')
         ->result_array();
        return $rs;
    }
    public  function  get_demo_answer($id){
        $rs = $this->db
            ->select('demo1,demo2,demo3,demo4,demo5,demo6,demo7,demo8,demo9')
            ->where('id',$id)
            ->get('demographic')
            ->result_array();
        return $rs;
    }


}
