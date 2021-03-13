<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Menu extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MenuModel','menu');
        if (!$this->session->userdata('openedCuyEa')) {
            redirect('login');
        } elseif ($this->session->userdata('hak') == "karyawan") {
            redirect('home');
        }
    }
 
    public function index()
    {
        $this->load->helper('url');
        $data['title'] = "Data Menu";
        $this->load->view('template/header', $data);
        $this->load->view('menu');
        $this->load->view('template/footer');
    }
 
    public function ajax_list()
    {
        $list = $this->menu->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $menu) {
            $no++;
            $row = array();
            $row[] = '<p class="text-center">' .$no. '</p>';
            $row[] = $menu->nama_menu;
            $row[] = $menu->kategori;
            $row[] = 'Rp. ' . number_format($menu->harga_jual, 0,',' ,'.');
            $row[] = $menu->tgl_ubah;
 
            //add html for action
            $row[] = '
            	<div align="center">
            		<a class="btn btn-warning" href="javascript:void(0)" title="Edit" onclick="edit('."'".$menu->id_menu."'".')"><i class="fas fa-pencil-alt"></i></a>
                  	<a class="btn btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus('."'".$menu->id_menu."'".')"><i class="fas fa-trash"></i></a>
                </div>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->menu->count_all(),
                        "recordsFiltered" => $this->menu->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->menu->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $this->_validate();

        $data = array(
                'nama_menu' => $this->input->post('nmMenu'),
                // 'foto' => $namaFile,
                'kategori' => $this->input->post('kategori'),
                'harga_jual' => implode(explode(".", $this->input->post('hrgJual'))),
                'tgl_buat' => date('Y-m-d H:i:s'),
            );

        if(!empty($_FILES['photo']['name']))
        {
            $upload = $this->_do_upload();
            $data['foto'] = $upload;
        }

        $insert = $this->menu->save($data);
        helper_log("add", "Tambah Data Menu");
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                'nama_menu' => $this->input->post('nmMenu'),
                'kategori' => $this->input->post('kategori'),
                'harga_jual' => implode(explode(".", $this->input->post('hrgJual'))),
                // 'tgl_buat' => date('Y-m-d H:i:s'),
            );
 
        if(!empty($_FILES['photo']['name']))
        {
            $upload = $this->_do_upload();
             
            //delete file
            $fotoe = $this->menu->get_by_id($this->input->post('idne'));
            if(file_exists('uploads/menu/'.$fotoe->foto) && $fotoe->foto)
                unlink('uploads/menu/'.$fotoe->foto);
 
            $data['foto'] = $upload;
        }

        $this->menu->update(array('id_menu' => $this->input->post('idne')), $data);
        helper_log("update", "Ubah Data Menu");
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        //delete file
        $fotoe = $this->menu->get_by_id($id);
        if(file_exists('uploads/menu/'.$fotoe->foto) && $fotoe->foto) {
            unlink('uploads/menu/'.$fotoe->foto);
        }
        $this->menu->delete_by_id($id);
        helper_log("delete", "Hapus Data Menu");
        echo json_encode(array("status" => TRUE));
    }
    
    private function _do_upload()
    {
        $config['upload_path']          = 'uploads/menu/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        // $config['max_size']             = 10000; //set max size allowed in Kilobyte
        // $config['max_width']            = 1000; // set max width image allowed
        // $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
 
        $this->load->library('upload', $config);
 
        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }
 
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('nmMenu') == '' || $this->input->post('kategori') == '' ||  $this->input->post('hrgJual') == '')
        {
            $data['inputerror'][] = 'nama_menu';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
 
}