<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class BahanBaku extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BahanBakuModel','bb');
        if (!$this->session->userdata('openedCuyEa')) {
            redirect('login');
        }  elseif ($this->session->userdata('hak') == "karyawan") {
            redirect('home');
        }
    }
 
    public function index()
    {
        $this->load->helper('url');
        $data['title'] = "Data Bahan Baku";
        $this->load->view('template/header', $data);
        $this->load->view('bahanBaku');
        $this->load->view('template/footer');
    }
 	
    public function dataBarang() {
		$data = $this->bb->dataBarang();
        echo json_encode($data);
    }

    public function ajax_list()
    {
        $list = $this->bb->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $bb) {
            $no++;
            $row = array();
            $row[] = '<p class="text-center">' .$no. '</p>';
            $row[] = $bb->bahan_baku;
            $row[] = 'Rp. ' . number_format($bb->total_harga, 0,',' ,'.');
            $row[] = $bb->tgl_ubah;
 
            //add html for action
            $row[] = '
            	<div align="center">
            		<a class="btn btn-warning" href="javascript:void(0)" title="Edit" onclick="edit('."'".$bb->id_bahan_baku."'".')"><i class="fas fa-pencil-alt"></i></a>
                  	<a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus('."'".$bb->id_bahan_baku."'".')"><i class="fas fa-trash"></i></a>
                </div>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->bb->count_all(),
                        "recordsFiltered" => $this->bb->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->bb->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $this->_validate();
        $data = array(
                'bahan_baku' => $this->input->post('bahanBaku'),
                'total_harga' => implode(explode(".", $this->input->post('totalHarga'))),
                'tgl_buat' => date('Y-m-d H:i:s'),
            );
        $insert = $this->bb->save($data);
        helper_log("add", "Tambah Data Bahan Baku");
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                'bahan_baku' => $this->input->post('bahanBaku'),
                'total_harga' => implode(explode(".", $this->input->post('totalHarga'))),
                // 'tgl_buat' => date('Y-m-d H:i:s'),
            );
        $this->bb->update(array('id_bahan_baku' => $this->input->post('idne')), $data);
        helper_log("update", "Ubah Data Bahan Baku");
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->bb->delete_by_id($id);
        helper_log("delete", "Hapus Data Bahan Baku");
        echo json_encode(array("status" => TRUE));
    }
 
 
    private function _validate()
    {
        $data = array();
        // $data['error_string'] = array();
        // $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('bahanBaku') == '' || $this->input->post('totalHarga') == '')
        {
            // $data['inputerror'][] = 'nama_bahan_baku';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
 
}