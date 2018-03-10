<?php defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('gravatar');
        /*if (!$this->ion_auth->logged_in()) {
            redirect('/');
        }*/
    }

    private function getURL($email) {
		return $this->gravatar->get($email);
    }

    public function gravatar($email) {
        redirect($this->getURL($email));
    }

    public function qrcode($data) {
        $this->load->library('ciqrcode');

        header("Content-Type: image/png");
        $params['data'] = $data;
        $params['level'] = 'H';
        $params['size'] = 1024;
        $this->ciqrcode->generate($params);
    }

    public function getData() {
        $this->load->model('Admin_model');
        echo json_encode($this->Admin_model->getData());
    }
}
