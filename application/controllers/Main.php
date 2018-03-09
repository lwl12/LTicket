<?php defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Ticket_model');
        $this->load->library('gravatar');
        $this->load->library('ion_auth');
    }

    public function index()
    {
        if (false && !$this->ion_auth->logged_in()) {
            redirect('/main/login');
        }
        $data['add_css'] = array();
        $data['add_js'] = array('main.js');
        $data['logged'] = $this->ion_auth->logged_in();
        $data['user'] = $this->User_model->userinfo();

        $data['startTime'] = $this->config->item('startTime');
        $data['endTime'] = $this->config->item('endTime');
        $data['num'] = $this->config->item('maxNum');

        $this->load->view('global/header', $data);
        $this->load->view('main/main', $data);
        $this->load->view('global/footer', $data);
    }

    public function login()
    {
        if ($this->ion_auth->logged_in()) {
            redirect('/');
        }
        $data['add_css'] = array();
        $data['add_js'] = array('login.js');
        $data['logged'] = $this->ion_auth->logged_in();
        $this->load->view('global/header', $data);
        $this->load->view('main/login');
        $this->load->view('global/footer', $data);
    }

    public function register()
    {
        if ($this->ion_auth->logged_in()) {
            redirect('/');
        }

        $data['add_css'] = array();
        $data['add_js'] = array('register.js');
        $data['logged'] = false;

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->view('global/header', $data);
        $this->load->view('main/register');
        $this->load->view('global/footer', $data);
    }
}
