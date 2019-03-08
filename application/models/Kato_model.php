<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**

 *

 */
class Kato_model extends CI_Model
{
    var $table = "t_person_cid a";
    var $select_column = array("a.CID", "a.NAME","a.LNAME", "a.BIRTH","a.age_y",'b.date_sample as date_serve');
    var $order_column = array("a.CID", "a.NAME", "a.age_y", null, null, null);
    public function read($id)
    {

        $rs = $this->db
            ->where('a.id', $id)
            ->get('outsite_permit a')
            ->row();
        return $rs;
    }
    public function save_kato($data)
    {
        $rs = $this->db
            ->set('cid',$data['cid'])
            ->set('pid',$data['pid'])
            ->set('provider',$data['provider'])
            ->set('hospcode', $this->hospcode)
            ->set('date_sample', to_mysql_date($data['date_sample']))
            ->set('date_exam', to_mysql_date($data['date_exam']))
            ->set('fecal_exam', $data['fecal_exam'])
            ->set('ov', $data['ov'])
            ->set('ov_egg', $data['ov_egg'])
            ->set('ov_epg', $data['ov_epg'])
            
            ->set('mif', $data['mif'])
            ->set('mif_egg', $data['mif_egg'])
            ->set('mif_epg', $data['mif_epg'])
            
            ->set('ss', $data['ss'])
            ->set('ss_egg', $data['ss_egg'])
            ->set('ss_epg', $data['ss_epg'])
            
            ->set('ech', $data['ech'])
            ->set('ech_egg', $data['ech_egg'])
            ->set('ech_epg', $data['ech_epg'])
            
            ->set('taenia', $data['taenia'])
            ->set('taenia_egg', $data['taenia_egg'])
            ->set('taenia_epg', $data['taenia_epg'])
            
            ->set('tt', $data['tt'])
            ->set('tt_egg', $data['tt_egg'])
            ->set('tt_epg', $data['tt_epg'])
            
            ->set('others', $data['others'])
            ->set('others_specify', $data['others_specify'])
            ->set('others_egg', $data['others_egg'])
            ->set('others_epg', $data['others_epg'])
            ->set('treatment', $data['treatment'])
            ->set('drug', $data['drug'])

            ->insert('kato');

        return $rs;
    }
    public function update_kato($data)
    {
            $rs = $this->db
                ->set('cid',$data['cid'])
                ->set('pid',$data['pid'])
                ->set('provider',$data['provider'])
                ->set('hospcode', $this->hospcode)
                ->set('date_sample', to_mysql_date($data['date_sample']))
                ->set('date_exam', to_mysql_date($data['date_exam']))
                ->set('fecal_exam', $data['fecal_exam'])
                ->set('ov', $data['ov'])
                ->set('ov_egg', $data['ov_egg'])
                ->set('ov_epg', $data['ov_epg'])

                ->set('mif', $data['mif'])
                ->set('mif_egg', $data['mif_egg'])
                ->set('mif_epg', $data['mif_epg'])

                ->set('ss', $data['ss'])
                ->set('ss_egg', $data['ss_egg'])
                ->set('ss_epg', $data['ss_epg'])

                ->set('ech', $data['ech'])
                ->set('ech_egg', $data['ech_egg'])
                ->set('ech_epg', $data['ech_epg'])

                ->set('taenia', $data['taenia'])
                ->set('taenia_egg', $data['taenia_egg'])
                ->set('taenia_epg', $data['taenia_epg'])

                ->set('tt', $data['tt'])
                ->set('tt_egg', $data['tt_egg'])
                ->set('tt_epg', $data['tt_epg'])

                ->set('others', $data['others'])
                ->set('others_specify', $data['others_specify'])
                ->set('others_egg', $data['others_egg'])
                ->set('others_epg', $data['others_epg'])
                ->set('treatment', $data['treatment'])
                ->set('drug', $data['drug'])
                ->set('last_edit', date("Y-m-d"))
                ->where('id',$data['answer_id'])
                ->update('kato');

        return $rs;
    }

    public function del_kato($id,$hoscpcode){
        $rs = $this->db
            ->where('hospcode',$hoscpcode)
            ->where('id',$id)
            ->delete('kato');
        return $rs;
    }

    public function get_answer($id){
        $rs = $this->db
            ->where('id',$id)
            ->get('kato')
            ->row();
        return $rs;
    }

    public  function  get_history($cid,$hospcode){
        $rs= $this->db
            ->where('cid',$cid)
            ->where('hospcode',$hospcode)
            ->get('kato')
            ->result_array();
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
        $this->db->join('kato b','a.cid = b.cid');

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
