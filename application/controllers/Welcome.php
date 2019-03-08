<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("online"))
            redirect(site_url('user/login'));
        $this->layout->setLayout('default_layout');
        $this->db = $this->load->database('default', true);
    }

    public function index()
    {
        $data['count_demo'] = $this->db->from('demographic')->count_all_results();
        $data['count_kato'] = $this->db->from('kato')->count_all_results();
        $data['count_behavior'] = $this->db->from('behavior')->count_all_results();
        $data['count_cca'] = $this->db->from('cca')->count_all_results();
        $data['user'] = $this->db->get('mas_users')->result();
        $this->layout->view('dashboard/index_view', $data);

    }
}
