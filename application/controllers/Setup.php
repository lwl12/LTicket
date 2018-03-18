<?php defined('BASEPATH') or exit('No direct script access allowed');

class Setup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['add_css'] = array();
        $data['add_js'] = array();
        $data['user'] = false;
        $data["logged"] = false;
        $this->load->view('universal/header', $data);
        $this->load->view('admin/setup', $data);
        $this->load->view('universal/footer', $data);
    }
}
