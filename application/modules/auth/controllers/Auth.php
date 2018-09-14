<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Auth extends CI_Controller {

    public function index($error = NULL) {
        $data = array(
            'title' => 'PT Jamu | Login',
            'action' => site_url('auth/login'),
            'error' => $error
        );
        $this->load->view('login', $data);
    }
 
    public function login() {
        $this->load->model('M_auth');
        $login = $this->M_auth->login($this->input->post('username'), md5($this->input->post('password')));
 
        if ($login == 1) {
            //ambil detail data
            $row = $this->M_auth->data_login($this->input->post('username'), md5($this->input->post('password')));
 
//          daftarkan session
            $data = array(
                'logged' => TRUE,
                'username' => $row->username,
                'nama' => $row->nama,
                'email' => $row->email,
                'create_time' => $row->create_time,
                'last_update' => $row->last_update,
                'foto' => $row->foto
            );
            $this->session->set_userdata($data);
 
//            redirect ke halaman sukses
            redirect('dashboard');
        } else {
//            tampilkan pesan error
            $error = 'username / password salah';
            $this->index($error);
        }
    }
 
    function logout() {
//        destroy session
        $this->session->sess_destroy();
        
//        redirect ke halaman login
        redirect(site_url('auth'));
    }
 
}
 
/* End of file auth.php */
/* Location: ./application/controllers/auth.php */