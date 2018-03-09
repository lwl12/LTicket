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

    public function can_not_login() {
        $email = $this->input->post('id');

        $identity = $this->ion_auth->where('email', $email)->users()->row();
        if (!$identity)	{
			$data = array(
				'status' => '-1',
				'msg' => '未找到相应账号！请联系管理员处理！'
			);
            return $this->output->set_output(json_encode($data));
        }

        $id = $identity->id;
        $active = $identity->active;

        if($active) {
            //forgot pwd
            $this->output->set_output(json_encode($this->forgot_pwd($identity)));
        } else {
            //re_active
            $this->output->set_output(json_encode($this->ion_auth->re_active($email)));
        }
    }

    private function forgot_pwd($identity)
    {

        // run the forgotten password method to email an activation code to the user
        $forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

        if ($forgotten) {
            // if there were no errors
            $data = array(
                'status' => '1',
                'msg' => '一封邮件已发送到您的注册邮箱，请进入邮箱进行下一步操作！'
            );
        } else {
            $data = array(
                'status' => '-1',
                'msg' => '更改密码失败：未知错误，请联系管理员处理。'
            );
        }
        $this->output->set_output(json_encode($data));
    }

    public function reset_pwd()
    {
        $code = $this->input->post('code');
        $pw = $this->input->post('pw');

        $this->form_validation->set_rules('pw', '密码', 'trim|required|min_length[6]');

        if ($this->form_validation->run() == false) {
            $data = array(
                'status' => '-1',
                'msg' => validation_errors()
            );
        } else {
            $user = $this->ion_auth->forgotten_password_check($code);
            if (!$user) {
                $data = array(
                    'status' => '-1',
                    'msg' => '更改密码失败：校验码无效！'
                );
                return $this->output->set_output(json_encode($data));
            }
        // finally change the password
        $identity = $user->{$this->config->item('identity', 'ion_auth')};

            $change = $this->ion_auth->reset_password($identity, $pw);

            if ($change) {
                $this->Log_model->add_log(5, $identity, 2);
                $data = array(
                    'status' => '1',
                    'msg' => '更改密码成功！请使用新密码登录！'
                );
                $this->output->set_output(json_encode($data));
            } else {
                $data = array(
                    'status' => '-1',
                    'msg' => '更改密码失败：未知错误，请联系管理员处理！'
                );
                $this->output->set_output(json_encode($data));
            }
        }
    }

    public function info()
    {
        $this->output->set_output(json_encode($this->User_model->userinfo()));
    }


    public function cpw()
    {
        $this->form_validation->set_rules('old_pw', '密码', 'trim|required');
        $this->form_validation->set_rules('new_pw', '密码', 'trim|required|min_length[6]');

        if ($this->form_validation->run() == false) {
            $data = array(
                'status' => '-1',
                'msg' => validation_errors()
            );
        } else {
            $old_pw = $this->input->post('old_pw');
            $new_pw = $this->input->post('new_pw');

            $identity = $this->session->userdata('identity');
            $change = $this->ion_auth->change_password($identity, $old_pw, $new_pw);
            if ($change) {
                //if the password was successfully changed
                $this->Log_model->add_log(5, $identity, 1);
                $data = array(
                    'status' => '1',
                    'msg' => '更改密码成功，请重新登录'
                );
                $this->logout();
            } else {
                $data = array(
                    'status' => '-1',
                    'msg' => '更改密码失败，请检查旧密码是否正确！'
                );
            }
        }
        $this->output->set_output(json_encode($data));
    }

    public function logout()
    {
        $this->ion_auth->logout();
        $data = array(
            'status' => '1',
            'msg' => '注销成功！'
        );
        $this->output->set_output(json_encode($data));
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
        $this->output->set_output(json_encode($data));
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


        $this->output->set_output(json_encode($data));
    }
}
