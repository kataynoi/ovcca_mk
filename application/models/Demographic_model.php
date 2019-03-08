<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**

 *

 */
class Demographic_model extends CI_Model
{
    var $table = "t_person_cid a";
    var $select_column = array("a.CID", "a.NAME","a.LNAME", "a.BIRTH","a.age_y",'b.date_serve');
    var $order_column = array("a.CID", "a.NAME", "a.age_y", null, null, null);
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

    public function get_person($hoscpcode){
        $rs = $this->db
            ->where('a.HOSPCODE',$hoscpcode)
            ->order_by('a.vhid','a.addr','a.age_y')
            ->join('demographic b','a.cid = b.cid')
            ->get('t_person_cid a')
            ->result();
        return $rs;
    }

    function make_datatables(){
        $this->make_query();
        if($_POST["length"] != -1)
        {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }


    function make_query()
    {
        $hospcode = $this->session->userdata('hospcode');
        $this->db->select($this->select_column);

        $this->db->from($this->table);

        if(isset($_POST["search"]["value"]))
        {
            $this->db->group_start();
            $this->db->like("a.CID", $_POST["search"]["value"]);
            $this->db->or_like("a.NAME", $_POST["search"]["value"]);
            $this->db->or_like("a.LNAME", $_POST["search"]["value"]);
            $this->db->group_end();
        }
        $this->db->where('a.HOSPCODE',$hospcode);
        $this->db->join('demographic b','a.cid = b.cid');

        if(isset($_POST["order"]))
        {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by('a.CID', 'ASC');
        }
    }

    function get_filtered_data(){
        $this->make_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_all_data()
    {
        $this->db->select("*");
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

}
