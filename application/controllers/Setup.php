<?php defined('BASEPATH') or exit('No direct script access allowed');

class Setup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['add_css'] = array();
        $data['add_js'] = array();
        $data['user'] = false;
        $data["logged"] = false;

        $this->load->view('universal/header', $data);
        $this->load->view('admin/setup', $data);
        $this->load->view('universal/footer', $data);
    }

    public function install()
    {

        $data['add_css'] = array();
        $data['add_js'] = array();
        $data['user'] = false;
        $data["logged"] = false;
        $data["err_desc"] = NULL;

        define('INITSQL', base64_decode("CVNFVCBTUUxfTU9ERSA9ICJOT19BVVRPX1ZBTFVFX09OX1pFUk8iOwoJU0VUIEFVVE9DT01NSVQgPSAwOwoJU1RBUlQgVFJBTlNBQ1RJT047CglTRVQgdGltZV96b25lID0gIiswODowMCI7CgoKCS8qITQwMTAxIFNFVCBAT0xEX0NIQVJBQ1RFUl9TRVRfQ0xJRU5UPUBAQ0hBUkFDVEVSX1NFVF9DTElFTlQgKi87CgkvKiE0MDEwMSBTRVQgQE9MRF9DSEFSQUNURVJfU0VUX1JFU1VMVFM9QEBDSEFSQUNURVJfU0VUX1JFU1VMVFMgKi87CgkvKiE0MDEwMSBTRVQgQE9MRF9DT0xMQVRJT05fQ09OTkVDVElPTj1AQENPTExBVElPTl9DT05ORUNUSU9OICovOwoJLyohNDAxMDEgU0VUIE5BTUVTIHV0ZjhtYjQgKi87CgoKCURST1AgVEFCTEUgSUYgRVhJU1RTIGBncm91cHNgOwoJQ1JFQVRFIFRBQkxFIGBncm91cHNgICgKCSAgYGlkYCBtZWRpdW1pbnQoOCkgVU5TSUdORUQgTk9UIE5VTEwsCgkgIGBuYW1lYCB2YXJjaGFyKDIwKSBOT1QgTlVMTCwKCSAgYGRlc2NyaXB0aW9uYCB2YXJjaGFyKDEwMCkgTk9UIE5VTEwKCSkgRU5HSU5FPUlubm9EQiBERUZBVUxUIENIQVJTRVQ9dXRmODsKCglEUk9QIFRBQkxFIElGIEVYSVNUUyBgbG9nYDsKCUNSRUFURSBUQUJMRSBgbG9nYCAoCgkgIGBpZGAgaW50KDExKSBOT1QgTlVMTCwKCSAgYGFjdGlvbmAgdGV4dCBOT1QgTlVMTCwKCSAgYHAxYCB0ZXh0LAoJICBgcDJgIHRleHQsCgkgIGBwM2AgdGV4dCwKCSAgYHRpbWVgIGJpZ2ludCgyMCkgTk9UIE5VTEwsCgkgIGBpcGAgdGV4dCBOT1QgTlVMTCwKCSAgYHVhYCB0ZXh0IE5PVCBOVUxMLAoJICBgdXNlcmAgaW50KDExKSBERUZBVUxUIE5VTEwKCSkgRU5HSU5FPUlubm9EQiBERUZBVUxUIENIQVJTRVQ9dXRmOG1iNDsKCglEUk9QIFRBQkxFIElGIEVYSVNUUyBgbG9naW5fYXR0ZW1wdHNgOwoJQ1JFQVRFIFRBQkxFIGBsb2dpbl9hdHRlbXB0c2AgKAoJICBgaWRgIGludCgxMSkgVU5TSUdORUQgTk9UIE5VTEwsCgkgIGBpcF9hZGRyZXNzYCB2YXJjaGFyKDQ1KSBOT1QgTlVMTCwKCSAgYGxvZ2luYCB2YXJjaGFyKDEwMCkgTk9UIE5VTEwsCgkgIGB0aW1lYCBpbnQoMTEpIFVOU0lHTkVEIERFRkFVTFQgTlVMTAoJKSBFTkdJTkU9SW5ub0RCIERFRkFVTFQgQ0hBUlNFVD11dGY4OwoKCURST1AgVEFCTEUgSUYgRVhJU1RTIGB0aWNrZXRgOwoJQ1JFQVRFIFRBQkxFIGB0aWNrZXRgICgKCSAgYGlkYCBpbnQoMTEpIE5PVCBOVUxMLAoJICBgdWlkYCBpbnQoMTEpIE5PVCBOVUxMLAoJICBgbmFtZWAgdGV4dCBOT1QgTlVMTCwKCSAgYHBob25lYCBiaWdpbnQoMjApIE5PVCBOVUxMLAoJICBgc3RhdHVzYCBpbnQoMTEpIE5PVCBOVUxMLAoJICBgdHlwZWAgaW50KDExKSBOT1QgTlVMTCwKCSAgYGNsYXNzYCBpbnQoMTEpIE5PVCBOVUxMLAoJICBgaXBgIHRleHQsCgkgIGB1YWAgdGV4dCwKCSAgYHRpbWVfY3JlYXRlYCBiaWdpbnQoMjApIE5PVCBOVUxMLAoJICBgdGltZV91c2VgIGJpZ2ludCgyMCkgREVGQVVMVCBOVUxMLAoJICBgY2hlY2tDb2RlYCBpbnQoMTEpIE5PVCBOVUxMCgkpIEVOR0lORT1Jbm5vREIgREVGQVVMVCBDSEFSU0VUPXV0ZjhtYjQ7CgoJRFJPUCBUQUJMRSBJRiBFWElTVFMgYHVzZXJzYDsKCUNSRUFURSBUQUJMRSBgdXNlcnNgICgKCSAgYGlkYCBpbnQoMTEpIFVOU0lHTkVEIE5PVCBOVUxMLAoJICBgaXBfYWRkcmVzc2AgdmFyY2hhcig0NSkgTk9UIE5VTEwsCgkgIGB1c2VybmFtZWAgdmFyY2hhcigxMDApIERFRkFVTFQgTlVMTCwKCSAgYHBhc3N3b3JkYCB2YXJjaGFyKDI1NSkgTk9UIE5VTEwsCgkgIGBzYWx0YCB2YXJjaGFyKDI1NSkgREVGQVVMVCBOVUxMLAoJICBgZW1haWxgIHZhcmNoYXIoMjU0KSBOT1QgTlVMTCwKCSAgYGFjdGl2YXRpb25fY29kZWAgdmFyY2hhcig0MCkgREVGQVVMVCBOVUxMLAoJICBgZm9yZ290dGVuX3Bhc3N3b3JkX2NvZGVgIHZhcmNoYXIoNDApIERFRkFVTFQgTlVMTCwKCSAgYGZvcmdvdHRlbl9wYXNzd29yZF90aW1lYCBpbnQoMTEpIFVOU0lHTkVEIERFRkFVTFQgTlVMTCwKCSAgYHJlbWVtYmVyX2NvZGVgIHZhcmNoYXIoNDApIERFRkFVTFQgTlVMTCwKCSAgYGNyZWF0ZWRfb25gIGludCgxMSkgVU5TSUdORUQgTk9UIE5VTEwsCgkgIGBsYXN0X2xvZ2luYCBpbnQoMTEpIFVOU0lHTkVEIERFRkFVTFQgTlVMTCwKCSAgYGFjdGl2ZWAgdGlueWludCgxKSBVTlNJR05FRCBERUZBVUxUIE5VTEwsCgkgIGBmaXJzdF9uYW1lYCB2YXJjaGFyKDUwKSBERUZBVUxUIE5VTEwsCgkgIGBsYXN0X25hbWVgIHZhcmNoYXIoNTApIERFRkFVTFQgTlVMTCwKCSAgYGNvbXBhbnlgIHZhcmNoYXIoMTAwKSBERUZBVUxUIE5VTEwsCgkgIGBwaG9uZWAgdmFyY2hhcigyMCkgREVGQVVMVCBOVUxMCgkpIEVOR0lORT1Jbm5vREIgREVGQVVMVCBDSEFSU0VUPXV0Zjg7CgoJRFJPUCBUQUJMRSBJRiBFWElTVFMgYHVzZXJzX2dyb3Vwc2A7CglDUkVBVEUgVEFCTEUgYHVzZXJzX2dyb3Vwc2AgKAoJICBgaWRgIGludCgxMSkgVU5TSUdORUQgTk9UIE5VTEwsCgkgIGB1c2VyX2lkYCBpbnQoMTEpIFVOU0lHTkVEIE5PVCBOVUxMLAoJICBgZ3JvdXBfaWRgIG1lZGl1bWludCg4KSBVTlNJR05FRCBOT1QgTlVMTAoJKSBFTkdJTkU9SW5ub0RCIERFRkFVTFQgQ0hBUlNFVD11dGY4OwoKCURST1AgVEFCTEUgSUYgRVhJU1RTIGBsdF9vcHRpb25zYDsKCUNSRUFURSBUQUJMRSBgbHRfb3B0aW9uc2AgKAoJICBgaWRgIGJpZ2ludCgyMCkgVU5TSUdORUQgTk9UIE5VTEwsCgkgIGBuYW1lYCB2YXJjaGFyKDE5MSkgQ09MTEFURSB1dGY4bWI0X3VuaWNvZGVfY2kgTk9UIE5VTEwgREVGQVVMVCAnJywKCSAgYHZhbHVlYCBsb25ndGV4dCBDT0xMQVRFIHV0ZjhtYjRfdW5pY29kZV9jaSBOT1QgTlVMTAoJKSBFTkdJTkU9SW5ub0RCIERFRkFVTFQgQ0hBUlNFVD11dGY4bWI0IENPTExBVEU9dXRmOG1iNF91bmljb2RlX2NpOwoKCglBTFRFUiBUQUJMRSBgZ3JvdXBzYAoJICBBREQgUFJJTUFSWSBLRVkgKGBpZGApOwoKCUFMVEVSIFRBQkxFIGBsb2dgCgkgIEFERCBQUklNQVJZIEtFWSAoYGlkYCksCgkgIEFERCBLRVkgYGlkYCAoYGlkYCk7CgoJQUxURVIgVEFCTEUgYGxvZ2luX2F0dGVtcHRzYAoJICBBREQgUFJJTUFSWSBLRVkgKGBpZGApOwoKCUFMVEVSIFRBQkxFIGB0aWNrZXRgCgkgIEFERCBQUklNQVJZIEtFWSAoYGlkYCksCgkgIEFERCBLRVkgYHBob25lYCAoYHBob25lYCk7CgoJQUxURVIgVEFCTEUgYHVzZXJzYAoJICBBREQgUFJJTUFSWSBLRVkgKGBpZGApOwoKCUFMVEVSIFRBQkxFIGB1c2Vyc19ncm91cHNgCgkgIEFERCBQUklNQVJZIEtFWSAoYGlkYCksCgkgIEFERCBVTklRVUUgS0VZIGB1Y191c2Vyc19ncm91cHNgIChgdXNlcl9pZGAsYGdyb3VwX2lkYCksCgkgIEFERCBLRVkgYGZrX3VzZXJzX2dyb3Vwc191c2VyczFfaWR4YCAoYHVzZXJfaWRgKSwKCSAgQUREIEtFWSBgZmtfdXNlcnNfZ3JvdXBzX2dyb3VwczFfaWR4YCAoYGdyb3VwX2lkYCk7CgoJQUxURVIgVEFCTEUgYGdyb3Vwc2AKCSAgTU9ESUZZIGBpZGAgbWVkaXVtaW50KDgpIFVOU0lHTkVEIE5PVCBOVUxMIEFVVE9fSU5DUkVNRU5ULCBBVVRPX0lOQ1JFTUVOVD0zOwoKCUFMVEVSIFRBQkxFIGBsb2dgCgkgIE1PRElGWSBgaWRgIGludCgxMSkgTk9UIE5VTEwgQVVUT19JTkNSRU1FTlQsIEFVVE9fSU5DUkVNRU5UPTIyOwoKCUFMVEVSIFRBQkxFIGBsb2dpbl9hdHRlbXB0c2AKCSAgTU9ESUZZIGBpZGAgaW50KDExKSBVTlNJR05FRCBOT1QgTlVMTCBBVVRPX0lOQ1JFTUVOVCwgQVVUT19JTkNSRU1FTlQ9MjsKCglBTFRFUiBUQUJMRSBgdGlja2V0YAoJICBNT0RJRlkgYGlkYCBpbnQoMTEpIE5PVCBOVUxMIEFVVE9fSU5DUkVNRU5ULCBBVVRPX0lOQ1JFTUVOVD01OwoKCUFMVEVSIFRBQkxFIGB1c2Vyc2AKCSAgTU9ESUZZIGBpZGAgaW50KDExKSBVTlNJR05FRCBOT1QgTlVMTCBBVVRPX0lOQ1JFTUVOVCwgQVVUT19JTkNSRU1FTlQ9MTA7CgoJQUxURVIgVEFCTEUgYHVzZXJzX2dyb3Vwc2AKCSAgTU9ESUZZIGBpZGAgaW50KDExKSBVTlNJR05FRCBOT1QgTlVMTCBBVVRPX0lOQ1JFTUVOVCwgQVVUT19JTkNSRU1FTlQ9MTE7CgoJQUxURVIgVEFCTEUgYGx0X29wdGlvbnNgCgkgIEFERCBQUklNQVJZIEtFWSAoYGlkYCksCgkgIEFERCBVTklRVUUgS0VZIGBuYW1lYCAoYG5hbWVgKTsKCglBTFRFUiBUQUJMRSBgbHRfb3B0aW9uc2AKCSAgTU9ESUZZIGBpZGAgYmlnaW50KDIwKSBVTlNJR05FRCBOT1QgTlVMTCBBVVRPX0lOQ1JFTUVOVDsKCglBTFRFUiBUQUJMRSBgdXNlcnNfZ3JvdXBzYAoJICBBREQgQ09OU1RSQUlOVCBgZmtfdXNlcnNfZ3JvdXBzX2dyb3VwczFgIEZPUkVJR04gS0VZIChgZ3JvdXBfaWRgKSBSRUZFUkVOQ0VTIGBncm91cHNgIChgaWRgKSBPTiBERUxFVEUgQ0FTQ0FERSBPTiBVUERBVEUgTk8gQUNUSU9OLAoJICBBREQgQ09OU1RSQUlOVCBgZmtfdXNlcnNfZ3JvdXBzX3VzZXJzMWAgRk9SRUlHTiBLRVkgKGB1c2VyX2lkYCkgUkVGRVJFTkNFUyBgdXNlcnNgIChgaWRgKSBPTiBERUxFVEUgQ0FTQ0FERSBPTiBVUERBVEUgTk8gQUNUSU9OOwoJQ09NTUlUOw=="));

        $this->load->view('universal/header', $data);
        try {
            $dbhost = $this->input->post('dbhost');
            $dbport = $this->input->post('dbport');
            $dbuser = $this->input->post('dbuser');
            $dbpass = $this->input->post('dbpass');
            $dbname = $this->input->post('dbname');

            $config['hostname'] = $dbhost;
            $config['port'] = $dbport;
            $config['username'] = $dbuser;
            $config['password'] = $dbpass;
            $config['database'] = '';
            $config['dbdriver'] = 'mysqli';
            $config['dbprefix'] = '';
            $config['pconnect'] = FALSE;
            $config['db_debug'] = TRUE;
            $config['cache_on'] = FALSE;
            $config['cachedir'] = '';
            $config['char_set'] = 'utf8';
            $config['dbcollat'] = 'utf8_general_ci';

            $tempDBC = $this->load->database($config, TRUE);

            if (!$tempDBC->query("CREATE DATABASE IF NOT EXISTS $dbname DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;")){
                $data["err_desc"] = '数据库创建失败！';
                $this->load->view('StaticPage/install_err');
                $this->load->view('universal/footer', $data);
                return false;
            }
            $config['database'] = $dbname;
            $DBP = $this->load->database($config, TRUE);

            $_arr = explode(';', INITSQL);

            foreach ($_arr as $_value) {
                if (!empty($_value) && !$DBP->query($_value.';')){
                    $data["err_desc"] = '数据表创建失败！'. $_value;
                    $this->load->view('StaticPage/install_err');
                    $this->load->view('universal/footer', $data);
                    return false;
                }
            }

            $db_info = "<?php
            defined('BASEPATH') OR exit('No direct script access allowed');

            \$active_group = 'default';
            \$query_builder = TRUE;

            \$db['default'] = array(
            	'dsn'	=> '',
            	'hostname' => '$dbhost',
                'port' => '$dbport',
            	'username' => '$dbuser',
            	'password' => '$dbpass',
            	'database' => '$dbname',
            	'dbdriver' => 'mysqli',
            	'dbprefix' => '',
            	'pconnect' => FALSE,
            	'db_debug' => (ENVIRONMENT !== 'production'),
            	'cache_on' => FALSE,
            	'cachedir' => '',
            	'char_set' => 'utf8',
            	'dbcollat' => 'utf8_general_ci',
            	'swap_pre' => '',
            	'encrypt' => FALSE,
            	'compress' => FALSE,
            	'stricton' => FALSE,
            	'failover' => array(),
            	'save_queries' => TRUE
            );";

            if (!file_put_contents(APPPATH."config/database.php", $db_info)) {
                $data["err_desc"] = "配置文件不可写，请手动复制以下信息到 application/config/database.php 文件并编辑。<br> $db_info ";
                $this->load->view('StaticPage/install_err');
                $this->load->view('universal/footer', $data);
                return false;
            }

            $this->load->database();
            $this->load->library('ion_auth');

            $mail_info = "<?php defined('BASEPATH') OR exit('No direct script access allowed');
            \$config['protocol'] = 'smtp';
            \$config['smtp_host'] = '".$this->input->post('mxhost')."';
            \$config['smtp_user'] = '".$this->input->post('mxuser')."';
            \$config['smtp_pass'] = '".$this->input->post('mxpass')."';
            \$config['smtp_port'] = '".$this->input->post('mxport')."';
            \$config['smtp_crypto'] = '".$this->input->post('mxsec')."';
            \$config['smtp_timeout'] = 15;
            \$config['mailtype'] = 'html';
            \$config['charset'] = 'utf-8';
            \$config['wordwrap'] = TRUE;
            \$config['newline'] = '\r\n';
            \$config['crlf'] = '\r\n';
";

            if (!file_put_contents(APPPATH."config/email.php", $mail_info)) {
                $data["err_desc"] = "邮件配置文件不可写，请手动复制以下信息到 application/config/email.php 文件并编辑。<br> $mail_info ";
                $this->load->view('StaticPage/install_err');
                $this->load->view('universal/footer', $data);
                return false;
            }

            $ion_config = file_get_contents(APPPATH."config/ion_auth.php").PHP_EOL."\$config['admin_email'] = '".$this->input->post('mxname')."';";
            if (!file_put_contents(APPPATH."config/ion_auth.php", $ion_config)) {
                $data["err_desc"] = "邮件配置文件不可写，请手动复制以下信息到 application/config/ion_auth.php 文件并编辑。<br> $ion_config ";
                $this->load->view('StaticPage/install_err');
                $this->load->view('universal/footer', $data);
                return false;
            }

            $udata = array(
                'username' => "Administrator",
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'email' => $this->input->post('email'),
                'created_on' => time(),
                'active' => 1,
                'ip_address' => $_SERVER["REMOTE_ADDR"]
            );

            if (!$this->db->insert('users', $udata)){
                $data["err_desc"] = "管理员用户创建失败，请检查邮件设置是否正确！";
                $this->load->view('StaticPage/install_err');
                $this->load->view('universal/footer', $data);
                return false;
            }

        } catch (\Exception $e) {
            $data["err_desc"] = $e->getMessage();
            $this->load->view('StaticPage/install_err');
            $this->load->view('universal/footer', $data);
            return false;
        }

        $this->load->view('StaticPage/install_succ');
        $this->load->view('universal/footer', $data);

    }
}
