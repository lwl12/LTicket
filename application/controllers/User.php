<?php defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Log_model');
        $this->load->library('ion_auth');
    }

    public function login()
    {
        $id = $this->input->post('id');
        if ($this->ion_auth->login($id, $this->input->post('pw'), false)) {
            $data = array(
                'status' => '1',
                'msg' => '登录成功'
            );
            $this->Log_model->add_log(2, $id);
        } else {
            $data = array(
                'status' => '-1',
                'msg' => '登录失败，可能是密码错误或账号未激活！'
            );
        }
        return $this->output->set_output(json_encode($data));
    }

    public function register()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', '用户名', 'trim|required|alpha_dash|min_length[3]|max_length[16]|is_unique[users.username]');
        $this->form_validation->set_rules('passwd', '密码', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('email', '电子邮箱', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('phone', '手机号', 'trim|required|numeric|exact_length[11]|is_unique[users.phone]');

        if ($this->form_validation->run() == false) {
            $data = array(
            'status' => '-1',
            'msg' => validation_errors()
        );
        } else {
            $group = array('2'); // Sets user to group "member".
            $additional_data = array(
            'phone' => $this->input->post('phone')
            );
            if ($this->ion_auth->register($this->input->post('username'), $this->input->post('passwd'), $this->input->post('email'), $additional_data, $group) != false) {
                $this->Log_model->add_log(0, $email);
                $data = array(
                'status' => '1',
                'msg' => '系统已经发送了一封激活邮件到您的邮箱，请进入邮箱查收并激活！'
            );
            } else {
                $data = array(
            'status' => '-1',
            'msg' => 'ion_auth Unexpected!'
        );
            }
        }


        return $this->output->set_output(json_encode($data));
    }
}
