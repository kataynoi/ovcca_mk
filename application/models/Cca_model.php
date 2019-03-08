<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**

 *

 */
class Cca_model extends CI_Model
{
    var $table = "t_person_cid a";
    var $select_column = array("a.CID", "a.NAME","a.LNAME", "a.BIRTH","a.age_y",'b.date_exam as date_serve');
    var $order_column = array("a.CID", "a.NAME", "a.age_y", null, null, null);
    public function read($id)
    {
        $rs = $this->db
            ->where('a.id', $id)
            ->get('outsite_permit a')
            ->row();
        return $rs;
    }
    public function save_cca($data)
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
            ->insert('cca');

        return $rs;
    }
    public function update_cca($data)
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
                ->update('cca');

        return $rs;
    }

    public function del_cca($id,$hoscpcode){
        $rs = $this->db
            ->where('hospcode',$hoscpcode)
            ->where('id',$id)
            ->delete('cca');
        return $rs;
    }

    public function get_answer($id){
        $rs = $this->db
            ->where('id',$id)
            ->get('cca')
            ->row();
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
        $this->db->join('cca b','a.cid = b.cid');

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
