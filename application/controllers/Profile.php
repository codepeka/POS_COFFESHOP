<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Profile extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProfileModel','pm');
        if (!$this->session->userdata('openedCuyEa')) {
            redirect('login');
        } elseif ($this->session->userdata('hak') == "owner") {
        	redirect('dashboard');
        }
    }
 
    public function index()
    {
        $data['title'] = "Profile";
        $this->load->view('sales/template/header', $data);
        $this->load->view('sales/profile');
        $this->load->view('sales/template/footer');
    }

    public function ajax_detail() {
    	$data = $this->pm->profile();
    	echo json_encode($data);
    }

    public function ajax_update()
    {
        $this->_validate();
        if ($this->pm->verifyPass(md5($this->input->post("passLama"))) == 1) {
	        if ($this->input->post('passBaru') == $this->input->post('ulangiPassBaru')) {
	        	# code...
		        $data = array(
		                'nama' => $this->input->post('nama'),
		                'username' => $this->input->post('username'),
		                'password' => md5($this->input->post('passBaru')),
		                // 'tgl_buat' => date('Y-m-d H:i:s'),
		            );
		        $this->pm->update(array('id_user' => $this->session->userdata('idUser')), $data);
		        helper_log("update", "Ubah Data Profile");
		        echo json_encode(array("status" => TRUE));
	        } else {
	        	echo json_encode(array("status" => "nosame"));
	        }
        } else {
        	echo json_encode(array("status" => "failed"));
        }
    } 
 
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('nama') == '' ||  
        	$this->input->post('username') == '' ||
        	$this->input->post('passLama') == '' ||
        	$this->input->post('passBaru') == '' ||
        	$this->input->post('ulangiPassBaru') == '')
        {
            $data['inputerror'][] = 'nama_barang';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
}