<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**

 *

 */
class Kato_model extends CI_Model
{

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
