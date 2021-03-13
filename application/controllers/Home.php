<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Home extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('HomeModel','hm');
         if (!$this->session->userdata('openedCuyEa')) {
            redirect('login');
        } elseif ($this->session->userdata('hak') == "owner") {
        	redirect('dashboard');
        }
    }
 
    public function index()
    {
        $data['title'] = "Dashboard";
        $this->load->view('sales/template/header', $data);
        $this->load->view('sales/home');
        $this->load->view('sales/template/footer');
    }


    public function ajax_list()
    {
        $list = $this->hm->get_datatables();
        $data = array();
        $no = $_POST['start'] + 1;
        foreach ($list as $r) {
            $row = array();
            $row[] = '<p class="text-center">' .$no++. '</p>';;
            $row[] = $r->nota;
            $row[] = 'Rp. ' . number_format($r->total_harga, 0,',' ,'.');
            $row[] = 'Rp. ' . number_format($r->diskon, 0,',' ,'.');
            $row[] = 'Rp. ' . number_format($r->hrgDiskon, 0,',' ,'.');
            $row[] = ($r->status) ? "<span class='badge badge-success'>Lunas</span>" : "<span class='badge badge-warning'>Proses</span>";
            $row[] = $r->tgl_ubah;
 
            //add html for action
            $row[] = '
                <div align="center">
                    <a class="btn btn-primary" href="javascript:void(0)" title="Detail" onclick="detail('."'".$r->id_pemesanan."'".')"><i class="fas fa-eye"></i> Detail</a>
                </div>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->hm->count_all(),
                        "recordsFiltered" => $this->hm->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_detail($id)
    {
        $dataPI = $this->hm->pemesanan_id($id);
        $dataDPI = $this->hm->detail_pemesanan_id($id);
        foreach ($dataPI as $row) {
            echo '<section class="section">
                    <div class="section-body">
                      <h2 class="section-title">
                        No. Invoice : INV-'. $row->id_pemesanan .'
                        <span class="mt-1 keKanan text-right" style="font-size: 14px;color: #ff00c8;font-weight: bold;">
                          Status : '. (($row->status == 1) ? "Lunas" : "Proses") .'
                        </span>
                      </h2>
                      <p class="section-lead invHead">Kasir : '. $row->nama .' <span class="keKanan text-right">Tanggal : '. $row->tgl_ubah .'</span></p>
                    </div>
                  </section>
                  <div class="table-responsive" id="showTable">
                    <table class="table table-bordered" id="myTable">
                      <thead>
                        <tr>
                          <th class="text-center no"> # </th>
                          <th>Nama Menu</th>
                          <th>Jumlah</th>
                          <th>Harga</th>
                        </tr>
                      </thead>
                      <tbody>';
            $no = 1;
            if ($dataDPI->num_rows() > 0) {
                foreach ($dataDPI->result() as $r) {
                    echo '<tr>
                            <td class="text-center">'. $no++ .'</td>
                            <td>'. $r->nama_menu .'</td>
                            <td>'. $r->jumlah_menu .'</td>
                            <td>Rp. '. number_format($r->harga_asli, 0,',' ,'.') .'</td>
                          </tr>';
                }
            }else { 
                echo '<tr>
                        <td class="text-center" colspan="4"><h4 style="color:red">Data Kosong</h4></td>
                      </tr>';
            }
            echo '      <tr style="border: 1px; background-color: #6777ef; color: #fff; font-weight: bold;">
                          <td class="text-right" colspan="3">SubTotal Harga : </td>
                          <td>Rp. '. number_format($row->total_harga, 0,',' ,'.') .'</td>
                        </tr>
                        <tr style="border: 1px; background-color: #6777ef; color: #fff; font-weight: bold;">
                          <td class="text-right" colspan="3">Diskon : </td>
                          <td>Rp. '. number_format($row->diskon, 0,',' ,'.') .'</td>
                        </tr>
                        <tr style="border: 1px; background-color: #6777ef; color: #fff; font-weight: bold;">
                          <td class="text-right" colspan="3">Total Harga : </td>
                          <td>Rp. '. number_format($row->hrgDiskon, 0,',' ,'.') .'</td>
                        </tr>
                      </tbody>
                    </table>
                  </div> ';
        }
    }
}