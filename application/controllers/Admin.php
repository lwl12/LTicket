<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->model('User_model');
        $this->load->model('Ticket_model');
        $this->load->model('Admin_model');
        if (!$this->ion_auth->is_admin()) {
            redirect('/');
        }
    }

    public function setting() {
        $data['add_css'] = array();
        $data['add_js'] = array('admin/setting.js');
        $data['logged'] = $this->ion_auth->logged_in();
        $data['user'] = $this->User_model->userinfo();

        $this->load->view('universal/header', $data);
        $this->load->view('admin/setting', $data);
        $this->load->view('universal/footer', $data);
    }

    public function enter() {
        $data['add_css'] = array('notie.min.css');
        $data['add_js'] = array('notie.min.js', 'admin/instascan.min.js', 'admin/enter.js');
        $data['logged'] = $this->ion_auth->logged_in();
        $data['user'] = $this->User_model->userinfo();

        $this->load->view('universal/header', $data);
        $this->load->view('admin/enter', $data);
        $this->load->view('universal/footer', $data);
    }

    public function users($uid = 0) {
        $data['add_css'] = array();
        $data['add_js'] = array('admin/users.js');
        $data['logged'] = $this->ion_auth->logged_in();
        $data['user'] = $this->User_model->userinfo();
        $data['uid'] = $uid;

        $this->load->view('universal/header', $data);
        $this->load->view('admin/users', $data);
        $this->load->view('universal/footer', $data);
    }

    public function tickets($uid = 0) {
        $data['add_css'] = array();
        $data['add_js'] = array('admin/tickets.js');
        $data['logged'] = $this->ion_auth->logged_in();
        $data['user'] = $this->User_model->userinfo();
        $data['uid'] = $uid;

        $this->load->view('universal/header', $data);
        $this->load->view('admin/tickets', $data);
        $this->load->view('universal/footer', $data);
    }

    public function data() {
        $data['add_css'] = array();
        $data['add_js'] = array('admin/data.js');
        $data['logged'] = $this->ion_auth->logged_in();
        $data['user'] = $this->User_model->userinfo();
        $data['data'] = $this->Admin_model->getData();

        $this->load->view('universal/header', $data);
        $this->load->view('admin/data', $data);
        $this->load->view('universal/footer', $data);
    }

    //apis
    public function api_enter() {
        $num = $this->input->post('num');
        $code = $this->input->post('code');
        echo json_encode($this->Admin_model->enter($num, $code));
    }

    public function api_search_users() {
        $key = $this->input->post('key');
        $value = $this->input->post('value');
        echo json_encode($this->Admin_model->search_users($key, $value));
    }

    public function api_user_info() {
        $id = $this->input->get('id');
        echo json_encode($this->User_model->userinfo($id));
    }

    public function api_user_update() {
        $data = $this->input->post();
        foreach ($data as &$value) {
            if ($value == '') $value = NULL;
        }
        echo json_encode($this->Admin_model->user_info_update($data));
    }

    public function api_user_changepw() {
        $id = $this->input->post('id');
        $new_pw = $this->input->post('new_pw');
        echo json_encode($this->Admin_model->user_change_passwd($id ,$new_pw));
    }

    public function api_add_auth() {
        $id = $this->input->post('id');
        echo json_encode($this->Admin_model->add_auth($id));
    }

    public function api_remove_auth() {
        $id = $this->input->post('id');
        echo json_encode($this->Admin_model->remove_auth($id));
    }

    public function api_search_tickets() {
        $key = $this->input->post('key');
        $value = $this->input->post('value');
        echo json_encode($this->Admin_model->search_tickets($key, $value));
    }

    public function api_ticket_info() {
        $id = $this->input->get('id');
        echo json_encode($this->Ticket_model->ticketinfo($id));
    }

    public function api_ticket_update() {
        $data = $this->input->post();
        echo json_encode($this->Admin_model->ticket_info_update($data));
    }

    public function api_ticket_add() {
        $email = $this->input->post('email');
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $type = $this->input->post('type');
        $class = $this->input->post('class');

        echo json_encode($this->Admin_model->addTicket($email, $name, $phone, $type, $class));
    }

    public function api_get_data() {
        echo json_encode($this->Admin_model->getData());
    }

    public function api_setting_update() {
        $data["startdate"] = $this->input->post('startdate');
        $data["finaldate"] = $this->input->post('finaldate');
        $data["alltnum"] = $this->input->post('alltnum');
        $data["pertnum"] = $this->input->post('pertnum');

        foreach ($data as $key => $value) {
            if (!$this->Admin_model->updateSetting($key, $value)){
                $returndata = array(
                    'status' => -1,
                    'msg' => '设置修改失败'
                );
                echo json_encode($returndata);
                return;
            }
        }

        $returndata = array(
            'status' => 1,
            'msg' => '设置修改成功'
        );
        echo json_encode($returndata);
    }
}
