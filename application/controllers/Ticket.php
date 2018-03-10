<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ticket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Ticket_model');
        if (!$this->ion_auth->logged_in()) {
            $this->output->set_status_header(403);
            $data = array(
                    'status' => '-1',
                    'msg' => '请先登录！'
                );
            echo json_encode($data);
            die();
        }
    }

    public function book()
    {
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');

        //check if can book
        $userinfo = $this->User_model->userinfo();
        $uid = $userinfo['id'];

        $can = $this->Ticket_model->canbook($uid, $phone);
        if ($can['status'] == 1) {
            $result = $this->Ticket_model->book($uid, $name, $phone);
            echo json_encode($result);
        } else {
            echo json_encode($can);
            return;
        }
    }

    public function getImg($id)
    {
        $this->Ticket_model->getImg($id);
    }
}
