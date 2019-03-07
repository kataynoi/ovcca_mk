<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**

 *

 */
class Behavior_model extends CI_Model
{

    public function read($id)
    {

        $rs = $this->db
            ->where('a.id', $id)
            ->get('outsite_permit a')
            ->row();
        return $rs;
    }
    public function save_behavior($data)
    {
        $rs = $this->db
            ->set('cid',$data['cid'])
            ->set('pid',$data['pid'])
            ->set('provider',$data['provider'])
            ->set('hospcode', $this->hospcode)
            ->set('vdate', to_mysql_date($data['vdate']))
            ->set('weight', $data['weight'])
            ->set('height', $data['height'])
            ->set('know', $data['know'])
            ->set('stop', $data['stop'])
            ->set('stopx', $data['stopx'])
            ->set('return', $data['return'])
            ->set('returnx', $data['returnx'])
            ->set('conform1', $data['conform1'])
            ->set('conform2', $data['conform2'])
            ->set('conform3', $data['conform3'])
            ->set('conform4', $data['conform4'])
            ->set('conform5', $data['conform5'])
            ->set('conform6', $data['conform6'])
            ->set('foodr1', $data['foodr1'])
            ->set('foodr2', $data['foodr2'])
            ->set('foodr3', $data['foodr3'])
            ->set('foodr4', $data['foodr4'])
            ->set('foodr5', $data['foodr5'])
            ->set('foodr6', $data['foodr6'])
            ->insert('behavior');

        return $rs;
    }
    public function update_behavior($data)
    {
            $rs = $this->db
                ->set('cid',$data['cid'])
                ->set('pid',$data['pid'])
                ->set('provider',$data['provider'])
                ->set('hospcode', $this->hospcode)
                ->set('vdate', to_mysql_date($data['vdate']))
                ->set('weight', $data['weight'])
                ->set('height', $data['height'])
                ->set('know', $data['know'])
                ->set('stop', $data['stop'])
                ->set('stopx', $data['stopx'])
                ->set('return', $data['return'])
                ->set('returnx', $data['returnx'])
                ->set('conform1', $data['conform1'])
                ->set('conform2', $data['conform2'])
                ->set('conform3', $data['conform3'])
                ->set('conform4', $data['conform4'])
                ->set('conform5', $data['conform5'])
                ->set('conform6', $data['conform6'])
                ->set('foodr1', $data['foodr1'])
                ->set('foodr2', $data['foodr2'])
                ->set('foodr3', $data['foodr3'])
                ->set('foodr4', $data['foodr4'])
                ->set('foodr5', $data['foodr5'])
                ->set('foodr6', $data['foodr6'])
                ->where('id',$data['answer_id'])
                ->update('behavior');

        return $rs;
    }

    public function del_behavior($id,$hoscpcode){
        $rs = $this->db
            ->where('hospcode',$hoscpcode)
            ->where('id',$id)
            ->delete('behavior');
        return $rs;
    }

    public function get_answer($id){
        $rs = $this->db
            ->where('id',$id)
            ->get('behavior')
            ->row();
        return $rs;
    }

}
