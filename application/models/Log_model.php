<?php
class Log_model extends CI_Model {
    public function __construct() {
        $this->load->library('user_agent');
        $this->load->database();
    }

    public function add_log($action, $p1 = NULL, $p2 = NULL, $p3 = NULL, $user = NULL) {
        if (!$this->config->item('enableLog')) return;

        date_default_timezone_set("Asia/Shanghai");
        $ip = $this->input->ip_address();
        $ua = $this->agent->agent_string();
        $ip = $this->security->xss_clean($ip);
        $ua = $this->security->xss_clean($ua);

        if (!is_null($user)) $user = $this->ion_auth->user()->row()->id;

        $data = array(
            'action' => $action,
            'p1' => $p1,
            'p2' => $p2,
            'p3' => $p3,
            'ip' => $ip,
            'ua' => $ua,
            'time' => time(),
            'user' => $user
        );

        $this->db->insert('log', $data);
    }
}

/**
 * action:
 * 0: register
 * 1: active user
 * 2: login
 * 3: auth
 * 4: book ticket
 * 5: change pw (1:via porfile 2:via email)
 *
 * 10: edit user
 * 11: edit ticket
 * 12: send ticket
 * 13: enter
 * 14: add auth
 * 15: remove auth
 */
