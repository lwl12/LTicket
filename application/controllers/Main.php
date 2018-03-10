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
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('/main/login');
        }
        $data['add_css'] = array();
        $data['add_js'] = array('main.js');
        $data['logged'] = $this->ion_auth->logged_in();
        $data['user'] = $this->User_model->userinfo();

        $data['startTime'] = $this->config->item('startTime');
        $data['endTime'] = $this->config->item('endTime');
        $data['num'] = $this->config->item('maxNum');

        $data['remainPercent'] = 90;

        $this->load->view('global/header', $data);
        $this->load->view('main/main', $data);
        $this->load->view('global/footer', $data);
    }

    public function profile()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('/main/login');
        }
        $data['add_css'] = array();
        $data['add_js'] = array('profile.js');
        $data['logged'] = $this->ion_auth->logged_in();
        $data['user'] = $this->User_model->userinfo();
        $this->load->view('global/header', $data);
        $this->load->view('main/profile');
        $this->load->view('global/footer', $data);
    }

    public function forgot_pwd($id = '')
    {
        if ($this->ion_auth->logged_in()) {
            redirect('/main/profile');
        }
        $data['add_css'] = array();
        $data['add_js'] = array('forgot_pwd.js');
        $data['logged'] = $this->ion_auth->logged_in();
        $data['id'] = $id;

        $this->load->view('global/header', $data);
        $this->load->view('main/forgot_pwd', $data);
        $this->load->view('global/footer', $data);
    }

    public function reset_pwd($code)
    {
        if ($this->ion_auth->logged_in()) {
            redirect('/main/profile');
        }
        $data['add_css'] = array();
        $data['add_js'] = array('reset_pwd.js');
        $data['logged'] = $this->ion_auth->logged_in();
        $data['code'] = $code;
        $this->load->view('global/header', $data);
        $this->load->view('main/reset_pwd');
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

        $this->load->view('global/header', $data);
        $this->load->view('main/register');
        $this->load->view('global/footer', $data);
    }
}
