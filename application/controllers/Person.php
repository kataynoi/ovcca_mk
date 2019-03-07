<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Person extends CI_Controller
{
    public $hospcode;
    public function __construct() {
        Parent::__construct();
        //$this->layout->setLayout('admin_layout');
        $this->load->model("t_person_cid_model",'t_person');
        $this->load->model('Person_model', 'person');
        $this->hdc = $this->load->database('hdc', true);
        $this->hospcode= $this->session->userdata('hospcode');
    }

    public function index()
    {
        $data['title'] = 'User data';
        $this->layout->view("person/person_list_view.php", $data);
    }
    public function person_target()
    {
        $data['title'] = 'User data';
        $this->layout->view("person/person_list_view.php", $data);
    }
    function fetch_person(){
        $fetch_data = $this->t_person->make_datatables();
        $data = array();
        foreach($fetch_data as $row)
        {
            $sub_array = array();
            $sub_array[] = $row->CID;
            $sub_array[] = $row->NAME." ".$row->LNAME;
            $sub_array[] = to_thai_date($row->BIRTH);
            $sub_array[] = $row->age_y;
            $sub_array[] = '<button data-btn="btn_Demographic" class="btn btn-success btn-sm btn-success" data-cid="'.$row->CID.'">รายละเอียดบุคล</button>';
            $sub_array[] = '<button data-btn="btn_del" class="btn btn-danger btn-sm" data-cid="'.$row->CID.'" class="btn btn-danger btn-xs">Delete</button>';
            $data[] = $sub_array;
        }
        $output = array(
            "draw"                      =>     intval($_POST["draw"]),
            "recordsTotal"              =>     $this->t_person->get_all_data(),
            "recordsFiltered"           =>     $this->t_person->get_filtered_data(),
            "data"                      =>     $data
        );
        echo json_encode($output);
    }

    public  function search_person_hdc (){

        $search_type =  $this->input->post('search_type');
        $txt_search = $this->input->post('txt_search');
        // console_log($search_type." + ".$txt_search);
        if($search_type=='cid'){
            $rs = $this->person->getPerson_by_cid($txt_search,$this->hospcode);
        }else if($search_type=='name'){
            $rs = $this->person->getPerson_by_name($txt_search,$this->hospcode);
        }

        if($rs)
        {
            $arr_result = array();
            foreach($rs as $r)
            {
                $obj = new stdClass();
                $obj->CID           = $r->CID;
                $obj->NAME          = $r->NAME;
                $obj->LNAME         = $r->LNAME;
                $obj->BIRTH         = to_thai_date_short($r->BIRTH);
                $obj->age_y         = $r->age_y;
                $arr_result[] = $obj;
            }

            $rows = json_encode($arr_result);
            //$rows = json_encode($rs);
            $json = '{"success": true, "rows": '.$rows.'}';
        }
        else{
            $json = '{"success": false, "msg": "ไม่มีข้อมูล."}';
        }
        render_json($json);
    }
    public function import_person(){
        $cid = $this->input->post('cid');

        $rs=$this->person->import_person($cid,$this->hospcode);
        if($rs){
            $json = '{"success": true}';
        }else{
            $json = '{"success": false}';
        }

        render_json($json);
    }
    public function del_person(){
        $cid = $this->input->post('cid');

        $rs=$this->person->del_person($cid,$this->hospcode);
        if($rs){
            $json = '{"success": true}';
        }else{
            $json = '{"success": false}';
        }

        render_json($json);
    }


    public  function individual ($cid){
        $this->load->model("question_model",'question');
        $rs = $this->t_person->get_person($cid,$this->hospcode);

        if($rs){
            $rs['PRENAME'] = get_prename($rs['PRENAME']);
            $rs['BIRTH'] = to_thai_date_short($rs['BIRTH']);
            $rs['vhid'] = get_address($rs['vhid']);
            $rs['SEX'] = get_sex($rs['SEX']);
            $rs['OCCUPATION_NEW'] = get_occupation($rs['OCCUPATION_NEW']);
            $rs['EDUCATION'] = get_education($rs['EDUCATION']);
            $rs['NATION'] = get_nation($rs['NATION']);
            $rs['TYPEAREA'] = get_typearea($rs['TYPEAREA']);
        }
        $data['person'] = $rs;
        $data['title'] = 'Demographic Information';
        $data['cid']= $cid;
        $data['answer_demo']= $this->question->get_demo_history_question($cid,$this->hospcode);
        $data['answer_kato']= $this->question->get_kato_history_question($cid,$this->hospcode);
        $data['answer_behavior']= $this->question->get_behavior_history_question($cid,$this->hospcode);
        $data['answer_ultrasound']= $this->question->get_ultrasound_history_question($cid,$this->hospcode);
        //$data['answer_demo']= $this->question->get_history_question('1',$cid,$this->hospcode);
        $this->layout->view("person/individual_view.php", $data);
    }
}

?>