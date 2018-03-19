<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StaticPage extends CI_Controller
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
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }
    public function activate_succ()
    {
        $data['add_css'] = $data['add_js'] = array();
        $data['logged'] = $this->ion_auth->logged_in();
        $this->load->view('universal/header', $data);
        $this->load->view('StaticPage/activate_succ');
        $this->load->view('universal/footer', $data);
    }
    public function activate_err()
    {
        $data['add_css'] = $data['add_js'] = array();
        $data['logged'] = $this->ion_auth->logged_in();
        $this->load->view('universal/header', $data);
        $this->load->view('StaticPage/activate_err', $data);
        $this->load->view('universal/footer', $data);
    }
    public function reset_succ()
    {
        $data['add_css'] = $data['add_js'] = array();
        $data['logged'] = $this->ion_auth->logged_in();
        $this->load->view('universal/header', $data);
        $this->load->view('StaticPage/reset_succ');
        $this->load->view('universal/footer', $data);
    }
    public function reset_err()
    {
        $data['add_css'] = $data['add_js'] = array();
        $data['logged'] = $this->ion_auth->logged_in();
        $this->load->view('universal/header', $data);
        $this->load->view('StaticPage/reset_err', $data);
        $this->load->view('universal/footer', $data);
    }
}
