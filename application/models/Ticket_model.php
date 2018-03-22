<?php  defined('BASEPATH') or exit('No direct script access allowed');

class Ticket_model extends CI_Model {
    public function __construct() {
        $this->load->library('ion_auth');
        $this->load->library('user_agent');
        $this->load->model('Log_model');
        $this->load->model('Admin_model');
        $this->load->database();
    }

    public function bookedNum($uid, $type) {
        $this->db->where('uid', $uid);
        $this->db->where('type', $type);
        return $this->db->count_all_results('ticket');
    }

    public function canbook($uid, $phone) {
        date_default_timezone_set("Asia/Shanghai");
        $now = time();

        $startTime=$endTime=$now;
        $Num=0;

            $startTime = strtotime($this->Admin_model->getSetting('startdate'));
            $endTime = strtotime($this->Admin_model->getSetting('finaldate'));
            $Num = $this->Admin_model->getSetting('pertnum');

        if ($now<$startTime || $now>$endTime) {
            $returndata = array(
                'status' => -1,
                'msg' => '不在预约时间内！'
            );
            return $returndata;
        }

        $this->db->where('uid', $uid);
        $this->db->where('type', 1);
        $total = $this->db->count_all_results('ticket');

        $remain = $this->Admin_model->getSetting('alltnum') - $this->count();
        if ($remain <= 0) {
            $returndata = array(
                'status' => -2,
                'msg' => '预约名额已全部发放完毕！'
            );
            return $returndata;
        }

        if ($total>=$Num) {
            $returndata = array(
                'status' => -1,
                'msg' => '已达到拥有票数上限！'
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

        //else
        $returndata = array(
            'status' => 1,
            'msg' => '允许预约',
            'num' => $Num-$total
        );
        return $returndata;
    }

    public function book($uid, $name, $phone) {
        date_default_timezone_set("Asia/Shanghai");

        $ip = $this->input->ip_address();
        $ua = $this->agent->agent_string();

        $name = $this->security->xss_clean($name);
        $phone = $this->security->xss_clean($phone);
        $ip = $this->security->xss_clean($ip);
        $ua = $this->security->xss_clean($ua);

        $data = array(
            'uid' => $uid,
            'name' => $name,
            'phone' => $phone,
            'checkCode' => mt_rand(100,999),
            'status' => 1,
            'type' => 1,
            'class' => 1,
            'ip' => $ip,
            'ua' => $ua,
            'time_create' => time()
        );
        if($this->db->insert('ticket', $data)) {
            $this->Log_model->add_log(4);
            $returndata = array(
                'status' => 1,
                'msg' => '预约成功！'
            );
            return $returndata;
        } else {
            $returndata = array(
                'status' => -1,
                'msg' => '预约失败，请联系管理员处理！'
            );
            return $returndata;
        }
    }

    public function getTicket($uid, $admin = FALSE) {
        $this->db->where('uid', $uid);
        $query = $this->db->get('ticket')->result_array();
        return $query;
    }

    public function getImg($ticket_id) {
        $this->db->where('id', $ticket_id);
        $query = $this->db->get('ticket')->row();

        $uid = $this->User_model->userinfo()['id'];

        $txt = "";
        if(count($query) == 0) {
            $txt1 = '     查无此票';
            $txt2 = '***';
        } else if($query->uid !== $uid) {
            $txt1 = '                  401 Unauthorized';
            $txt2 = '***';
        } else {
            $tid = sprintf("%04d", $query->id);
            $tcode = $query->checkCode;

            $txt1 = $tid;
            $txt2 = $tcode;
        }



        $path = './assets/img/tickets/'.trim($txt1);
        copy('./assets/img/ticket-bg.png', $path);

        $this->load->library('image_lib');

        //第一次，加编号
        $config['source_image'] = $path;
        $config['dynamic_output'] = FALSE;
        $config['wm_text'] = $txt1;
        $config['wm_type'] = 'text';
        $config['wm_font_path'] = './assets/fonts/fzxh.ttf';
        $config['wm_font_size'] = '16';
        $config['wm_font_color'] = '000000';
        $config['wm_hor_alignment'] = 'center';
        $config['wm_vrt_alignment'] = 'center';
        $config['wm_hor_offset'] = '135'; //中心水平偏移(px)
        $config['wm_vrt_offset'] = '59'; //中心垂直偏移(px)
        $this->image_lib->initialize($config);
        $this->image_lib->watermark();

        //第二次，加验证码
        $config['source_image'] = $path;
        $config['dynamic_output'] = TRUE;
        $config['wm_text'] = $txt2;
        $config['wm_type'] = 'text';
        $config['wm_font_path'] = './assets/fonts/fzxh.ttf';
        $config['wm_font_size'] = '16';
        $config['wm_font_color'] = '000000';
        $config['wm_hor_alignment'] = 'center';
        $config['wm_vrt_alignment'] = 'center';
        $config['wm_hor_offset'] = '130'; //中心水平偏移(px)
        $config['wm_vrt_offset'] = '169'; //中心垂直偏移(px)
        $this->image_lib->initialize($config);
        //直接输出第二次结果
        $this->image_lib->watermark();

        if (trim($txt1) != "") {
            unlink($path);
        }
    }

    public function count($type = 1) {
        $this->db->where('type', $type);
        return $this->db->count_all_results('ticket');
    }

    public function ticketinfo($id) {
        date_default_timezone_set("Asia/Shanghai");

        $ticket = $this->db->where('id', $id)->get('ticket')->row_array();
        return $ticket;
    }

    public function sendSMS($phone) {
        $this->db->where('phone', $phone);
        $query = $this->db->get('ticket')->row();

        $arr = Array(
            'code' => sprintf("%04d", $query->id),
            'checkNum' => $query->checkCode
        );
        $this->SMS_model->sendSms('泉五换届', 'SMS_114386056', $phone, $arr);
    }
}
