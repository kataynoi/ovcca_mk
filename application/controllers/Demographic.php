<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Demographic extends CI_Controller
{
    public $hospcode;
    public function __construct() {
        Parent::__construct();
        //$this->layout->setLayout('admin_layout');
        if(!$this->session->userdata("online"))
            redirect(site_url('user/login'));
        $this->load->model('Demographic_model', 'demo');
        //$this->load->model('Person_model', 'person');
        $this->load->model("t_person_cid_model",'t_person');
        $this->hospcode= $this->session->userdata('hospcode');
    }

    public function index()
    {
        $data['title'] = 'User data';
        $this->layout->view("demographic/demo_person_list_view.php", $data);
    }
    public function person_target()
    {

        $data['title'] = 'User data';
        $this->layout->view("person/demo_person_list_view.php", $data);
    }
    function fetch_person(){
        $fetch_data = $this->demo->make_datatables();
        $data = array();
        foreach($fetch_data as $row)
        {
            $sub_array = array();
            $sub_array[] = $row->CID;
            $sub_array[] = $row->NAME." ".$row->LNAME;
            $sub_array[] = to_thai_date($row->BIRTH);
            $sub_array[] = $row->age_y;
            $sub_array[] = to_thai_date_full($row->date_serve);
            $sub_array[] = 'xxxx';
            $sub_array[] = '<button data-btn="btn_view" class="btn btn-success btn-sm btn-success" data-cid="'.$row->CID.'">View</button>';
              $data[] = $sub_array;
        }
        $output = array(
            "draw"                      =>     intval($_POST["draw"]),
            "recordsTotal"              =>     $this->demo->get_all_data(),
            "recordsFiltered"           =>     $this->demo->get_filtered_data(),
            "data"                      =>     $data
        );
        echo json_encode($output);
    }
    public  function demographic ($cid,$id,$view=''){

        $this->load->model("question_model",'question');
        if(!empty($view)){
            $data['disable']="disabled";
        }else{
            $data['disable']="";
        }

        if($id!=0){
            $data['answer'] = $this->question->get_demo_answer($id);
            $data['action'] = 'update';
        }
        else
        {$data['action'] = 'insert';}
        $data['answer_id']=$id;
        $q = $this->question->read(1);
        if($q)
        {
            $arr_result = array();
            foreach($q as $r)
            {
                $obj = new stdClass();

                $obj->q_id        = $r->id;
                $obj->q_type        = $r->q_type;
                $obj->question    = $r->question;
                $obj->q_name    = $r->q_name;
                $obj->answer        = $this->question->get_answer($r->id);
                $arr_result[] = $obj;
            }
            $data['question']= $arr_result;
        }
        $rs = $this->demo->get_person($cid,$this->hospcode);
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
        $data['history_answer']= $this->question->get_demo_history_question('1',$cid,$this->hospcode);
        //$data['answer']['provider'] = get_provider($data['answer']['provider']);
        $this->layout->view("demographic/demographic_view.php", $data);
    }

    public function save_demo(){
        $data=$this->input->post('items');
        $action=$this->input->post('action');
        if($action=='insert'){
            $rs=$this->demo->save_demo($data);
        }else if($action=='update'){
            $rs=$this->demo->update_demo($data);
        }
        if($rs){
            $json = '{"success": true}';
            //$json = '{"success": true,"msg":"ท่านสามารถเข้าสู่ระบบได้ทันที"}';
        }else{
            $json = '{"success": false}';
        }

        render_json($json);
    }
    public function del_demo(){
        $cid = $this->input->post('id');

        $rs=$this->demo->del_demo($cid,$this->hospcode);
        if($rs){
            $json = '{"success": true}';
        }else{
            $json = '{"success": false}';
        }

        render_json($json);
    }
}
?>