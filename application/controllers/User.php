<?php defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('gravatar');
        $this->load->library('ion_auth');
    }


    public function register()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', '用户名', 'trim|required|alpha_dash|min_length[3]|max_length[16]');
        $this->form_validation->set_rules('passwd', '密码', 'trim|required');
        $this->form_validation->set_rules('email', '电子邮箱', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('phone', '手机号', 'trim|required|numeric|exact_length[11]|is_unique[users.phone]');

        if ($this->form_validation->run() == false) {
            $data = array(
            'status' => '-1',
            'msg' => '表单验证失败！'
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
            'msg' => 'ion_auth 失败！'
        );
        }
        }


        return $this->output->set_output(json_encode($data));
    }
}
