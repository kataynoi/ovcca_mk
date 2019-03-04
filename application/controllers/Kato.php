<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kato extends CI_Controller
{
    public $hospcode;
    public function __construct() {
        Parent::__construct();
        //$this->layout->setLayout('admin_layout');
        if(!$this->session->userdata("online"))
            redirect(site_url('user/login'));
        $this->load->model('Kato_model', 'kato');
        //$this->load->model('Person_model', 'person');
        $this->load->model("t_person_cid_model",'t_person');
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
            $sub_array[] = '<button data-btn="btn_Demographic" class="btn btn-success btn-sm btn-success" data-cid="'.$row->CID.'">บันทึกข้อมูลทั่วไป</button>';
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
    public  function kato ($cid,$id,$view=''){

        $this->load->model("question_model",'question');
        if(!empty($view)){
            $data['disable']="disabled";
        }else{
            $data['disable']="";
        }

        if($id!=0){
            $data['answer'] = $this->question->get_kato_answer($id);
            $data['action'] = 'update';
        }
        else
        {$data['action'] = 'insert';}
        $data['answer_id']=$id;
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
        $data['title'] = 'OV-01K (Kato-Katz)';
        $data['cid']= $cid;
        $data['history_answer']= $this->question->get_demo_history_question('1',$cid,$this->hospcode);
        //$data['answer']['provider'] = get_provider($data['answer']['provider']);
        $this->layout->view("kato/kato_view.php", $data);
    }

    public function save_kato(){
        $data=$this->input->post('items');
        $action=$this->input->post('action');
        if($action=='insert'){
            $rs=$this->kato->save_kato($data);
        }else if($action=='update'){
            $rs=$this->kato->update_kato($data);
        }
        if($rs){
            $json = '{"success": true}';
            //$json = '{"success": true,"msg":"ท่านสามารถเข้าสู่ระบบได้ทันที"}';
        }else{
            $json = '{"success": false}';
        }

        render_json($json);
    }
    public function del_kato(){
        $cid = $this->input->post('id');

        $rs=$this->kato->del_kato($cid,$this->hospcode);
        if($rs){
            $json = '{"success": true}';
        }else{
            $json = '{"success": false}';
        }

        render_json($json);
    }
    public  function  get_answer(){
        $id = $this->input->post('id');
        $rs = $this->kato->get_answer($id);
        if($rs){
            $rows = json_encode($rs);
            $json = '{"success": true, "rows": '.$rows.'}';
        }
        else{
            $json = '{"success": false, "msg": "ไม่มีข้อมูล."}';
        }
        render_json($json);
    }
}
?>