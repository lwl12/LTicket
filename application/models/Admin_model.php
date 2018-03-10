<?php
class Admin_model extends CI_Model {
    public function __construct()
    {
        $this->load->library('ion_auth');
        $this->load->model('User_model');
        $this->load->model('Ticket_model');
        $this->load->model('Log_model');
        $this->load->database();
    }

    public function enter($num, $code) {
        $this->db->where('id', $num);
        $query = $this->db->get('ticket')->row();
        if (is_null($query)) {
            $returndata = array(
                'status' => -1,
                'msg' => '失败 - 无此票号'
            );
            return $returndata;
        }

        if ($query->checkCode != $code) {
            $returndata = array(
                'status' => -1,
                'msg' => '失败 - 校验码错误'
            );
            return $returndata;
        }

        if ($query->status != 1) {
            $returndata = array(
                'status' => -1,
                'msg' => '失败 - 状态无效'
            );
            return $returndata;
        }

        date_default_timezone_set("Asia/Shanghai");
        $data = array(
            'status' => 2,
            'time_use' => time()
        );
        $this->db->where('id', $num);

        if ($this->db->update('ticket', $data)) {
            $this->Log_model->add_log(13, $num);
            $returndata = array(
                'status' => 1,
                'msg' => '检入成功'
            );
            return $returndata;
        } else {
            $returndata = array(
                'status' => -1,
                'msg' => '未知错误，请联系管理员！'
            );
            return $returndata;
        }
    }

    public function search_users($key, $value) {
        if ($key == 'id') {
            $query = $this->db->where('id', $value)->get('users')->result_array();
        } else {
            $query = $this->db->like($key, $value)->get('users')->result_array();
        }
        return $query;
    }

    public function user_info_update($arr) {
        if ($this->ion_auth->update($arr['id'], $arr)) {
            $this->Log_model->add_log(10, $arr['id']);
            $returndata = array(
                'status' => 1,
                'msg' => '用户资料修改成功'
            );
            return $returndata;
        } else {
            $returndata = array(
                'status' => -1,
                'msg' => '用户资料修改失败，请联系管理员！'
            );
            return $returndata;
        };
    }

    public function user_change_passwd($id ,$new_pw) {
        $arr = Array(
            'password' => $new_pw
        );
        if ($this->ion_auth->update($id, $arr)) {
            $returndata = array(
                'status' => 1,
                'msg' => '密码修改成功'
            );
            return $returndata;
        } else {
            $returndata = array(
                'status' => -1,
                'msg' => '密码修改失败，请联系管理员！'
            );
            return $returndata;
        };
    }


    public function search_tickets($key, $value) {
        if ($key == 'id' || $key == 'uid') {
            $query = $this->db->where($key, $value)->get('ticket')->result_array();
        } else {
            $query = $this->db->like($key, $value)->get('ticket')->result_array();
        }
        return $query;
    }

    public function ticket_info_update($arr) {
        if ($this->db->where('id', $arr['id'])->update('ticket', $arr)) {
            $this->Log_model->add_log(11, $arr['id']);
            $returndata = array(
                'status' => 1,
                'msg' => '门票信息修改成功'
            );
            return $returndata;
        } else {
            $returndata = array(
                'status' => -1,
                'msg' => '门票信息修改失败，请联系管理员！'
            );
            return $returndata;
        };
    }

    public function addTicket($email, $name, $phone, $type, $class) {
        date_default_timezone_set("Asia/Shanghai");

        $query = $this->db->where('email', $email)->get('users')->row();

        if(is_null($query)) {
            $returndata = array(
                'status' => -1,
                'msg' => '发票失败，无此用户！'
            );
            return $returndata;
        }

        $this->db->where('phone', $phone);
        if ($this->db->count_all_results('ticket')) {
            $returndata = array(
                'status' => -1,
                'msg' => '该手机号已预约成功！'
            );
            return $returndata;
        }

        $arr = Array(
            'uid' => $query->id,
            'name' => $name,
            'phone' => $phone,
            'type' => $type,
            'class' => $class,
            'checkCode' => mt_rand(100,999),
            'status' => 1,
            'time_create' => time()
        );

        if ($this->db->insert('ticket', $arr)) {
            $this->Log_model->add_log(12, $query->id);
            $returndata = array(
                'status' => 1,
                'msg' => '发票成功'
            );
            return $returndata;
        } else {
            $returndata = array(
                'status' => -1,
                'msg' => '发票失败，请联系管理员！'
            );
            return $returndata;
        };
    }

    public function getData() {
        $this->db->select('active');
        $data['user_num'] = $this->db->count_all_results('users');
        $data['active_user_num'] = $this->db->where('active', 1)->count_all_results('users');
        $data['normal_ticket_num'] = $this->db->where('type', 1)->count_all_results('ticket');
        $data['staff_ticket_num'] = $this->db->where('type', 2)->count_all_results('ticket');

        return $data;
    }
}
