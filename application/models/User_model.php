<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->model('Log_model');
    }

    public function userinfo($id = null)
    {
        date_default_timezone_set("Asia/Shanghai");
        $user = null;

        if (is_null($id)) {
            $user = $this->ion_auth->user()->row();
        } else {
            $user = $this->ion_auth->where('id', $id)->users()->row();
        }

        $data = array(
            'id' => $user->id,
            'username' => $this->security->xss_clean($user->username),
            'email' => $user->email,
            'created_on' => date('Y-m-d H:i:s', $user->created_on),
            'last_login' => date('Y-m-d H:i:s', $user->last_login),
            'phone' => $user->phone,
            'admin' => $this->ion_auth->is_admin()
        );
        return $data;
    }
}
