<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class LaporanBahanBaku extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LaporanBahanBakuModel','lbbm');
        if (!$this->session->userdata('openedCuyEa')) {
            redirect('login');
        } elseif ($this->session->userdata('hak') == "karyawan") {
            redirect('home');
        }
    }
 
    public function index()
    {
        $data['title'] = "Laporan Pengeluaran";
        $this->load->view('template/header', $data);
        $this->load->view('LaporanBahanBaku');
        $this->load->view('template/footer');
    }

    public function ajax_detail($id)
    {
        $data = $this->lbbm->ajax_detail_id($id);
        echo json_encode($data);
    }
    
    public function cetak($id) {
        $data['title'] = "Laporan Pengeluaran";
        $data['date'] = $id;
        $data['dataID'] = $this->lbbm->ajax_detail_id($id);
        $this->load->view('cetak/CetakLaporanBahanBaku', $data);
    }
}