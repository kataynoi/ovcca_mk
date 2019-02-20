<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**

 *

 */
class Demographic_model extends CI_Model
{

    public function read($id)
    {

        $rs = $this->db
            ->where('a.id', $id)
            ->get('outsite_permit a')
            ->row();
        return $rs;
    }
    public function save_demo($data)
    {
        $rs = $this->db
            ->set('cid',$data['cid'])
            ->set('pid',$data['pid'])
            ->set('provider',$data['provider'])
            ->set('hospcode', $this->hospcode)
            ->set('date_serve', to_mysql_date($data['date_serve']))
            ->set('demo1', $data['demo1'])
            ->set('demo2', $data['demo2'])
            ->set('demo3', $data['demo3'])
            ->set('demo4', $data['demo4'])
            ->set('demo5', $data['demo5'])
            ->set('demo6', $data['demo6'])
            ->set('demo7', $data['demo7'])
            ->set('demo8', $data['demo8'])
            ->set('demo9', $data['demo9'])
            ->insert('demographic');

        return $rs;
    }
    public function update_demo($data)
    {
        $rs = $this->db
            //->set('cid',$data['cid'])
            //->set('pid',$data['pid'])
            //->set('provider',$data['provider'])
            //->set('hospcode', $this->hospcode)
            ->set('date_serve', to_mysql_date($data['date_serve']))
            ->set('demo1', $data['demo1'])
            ->set('demo2', $data['demo2'])
            ->set('demo3', $data['demo3'])
            ->set('demo4', $data['demo4'])
            ->set('demo5', $data['demo5'])
            ->set('demo6', $data['demo6'])
            ->set('demo7', $data['demo7'])
            ->set('demo8', $data['demo8'])
            ->set('demo9', $data['demo9'])
            ->set('last_edit', date("Y-m-d"))
            ->where('id',$data['answer_id'])
            ->update('demographic');

        return $rs;
    }

    public function del_demo($id,$hoscpcode){
        $rs = $this->db
            ->where('hospcode',$hoscpcode)
            ->where('id',$id)
            ->delete('demographic');
        return $rs;
    }

}
