<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel','lm');
    }
 
    public function index()
    {
        // Kondisi Ketika Session Opened == TRUE
        if ($this->session->userdata('openedCuyEa')) {
			redirect('dashboard');
		}
		
        $data['title'] = "Login LaPesen";
        $this->load->view('login', $data);
    }

    public function signIn() {
    	$data = $this->lm->signIn($_POST['username'], $_POST['password']);
		if ($data->num_rows() > 0) {
			$this->session->set_userdata('idUser', $data->row()->id_user);
            $this->session->set_userdata('name', $data->row()->nama);
            $this->session->set_userdata('username', $data->row()->username);
            $this->session->set_userdata('hak', $data->row()->hak);
            // $this->session->set_userdata('foto', $data->row()->foto);
			$this->session->set_userdata('openedCuyEa', TRUE);
            helper_log("login", "Login LaPesen");
            
            if ($data->row()->hak == "owner") {
			    redirect('dashboard');
            }elseif ($data->row()->hak == "karyawan") {
                redirect('home');
            }
		}else{
			redirect('login');
		}
    }

    public function logout() {
        helper_log("logout", "Logout LaPesen");
    	
        $this->session->set_userdata('idUser', "");
		$this->session->set_userdata('name', "");
		$this->session->set_userdata('username', "");
		$this->session->set_userdata('hak', "");
		// $this->session->set_userdata('foto', $data->row()->foto);
		$this->session->set_userdata('openedCuyEa', FALSE);

		redirect('login');
    }
}