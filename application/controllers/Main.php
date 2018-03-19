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

        $remain = $this->config->item('total') - $this->Ticket_model->count();
        $data['remainPercent'] = round((double)$remain / $this->config->item('total'), 4) * 100;

        $this->load->view('universal/header', $data);
        $this->load->view('main/main', $data);
        $this->load->view('universal/footer', $data);
    }

    public function myTicket() {
        if (!$this->ion_auth->logged_in()) {
            redirect('/main/login');
        }
        $data['add_css'] = array();
        $data['add_js'] = array('myTicket.js');
        $data['logged'] = $this->ion_auth->logged_in();
        $data['user'] = $this->User_model->userinfo();
        $data['ticket'] = array_reverse($this->Ticket_model->getTicket($data['user']['id'])); //反过来，先预约的先输出

        $this->load->view('universal/header', $data);
        $this->load->view('ticket/myTicket', $data);
        $this->load->view('universal/footer', $data);
    }

    public function book()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('/main/login');
        }
        $data['add_css'] = array();
        $data['add_js'] = array('ticket_book.js');
        $data['logged'] = $this->ion_auth->logged_in();
        $data['user'] = $this->User_model->userinfo();

        $bookedNum = $this->Ticket_model->bookedNum($data['user']['id'], 1);

        $this->load->view('global/header', $data);

        date_default_timezone_set("Asia/Shanghai");
        $now = time();
        $startTime=$endTime=$now;
        $startTime = strtotime($this->config->item('startTime'));
        $endTime = strtotime($this->config->item('endTime'));

        if ($bookedNum >= $this->config->item('maxNum')) {
            $this->load->view('StaticPage/booked');
        } elseif ($now<$startTime || $now>$endTime) {
            $this->load->view('StaticPage/book_time_err');
        } elseif ($this->config->item('total') - $this->Ticket_model->count() <= 0) {
            $this->load->view('StaticPage/book_no_remain');
        } else {
            $this->load->view('ticket/book');
        }

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
        $this->load->view('universal/header', $data);
        $this->load->view('main/profile');
        $this->load->view('universal/footer', $data);
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
