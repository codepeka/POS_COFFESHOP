<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Sales extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SalesModel','sm');
        if (!$this->session->userdata('openedCuyEa')) {
        	redirect('login');
        } elseif ($this->session->userdata('hak') == "owner") {
        	redirect('dashboard');
        }

        $this->cekNota();
    }

    private function cekNota() {
    	$data = $this->sm->cekNota();
    	
    	if($data->num_rows() > 0) {
    		$this->session->set_userdata('id_pemesanan', $data->row()->id_pemesanan);
    	} else {
    		$idp = $this->sm->insertPemesanan();
    		$this->session->set_userdata('id_pemesanan', $idp);
    	}
    }

    public function savePemesanan() {
    	$ip = $this->session->userdata('id_pemesanan');
    	if ($this->sm->cekOrderMenu($ip) > 0) {
	    	$totalHarga = $this->input->post('totalHarga');
	    	$diskon = $this->input->post('diskon');

	    	$data = array('total_harga' => $totalHarga, 'diskon' => $diskon, 'status' => 1);
	    	$where = array('id_pemesanan' => $this->session->userdata('id_pemesanan'));
	    	$this->sm->savePemesananModel($data, $where);
    		
    		$status = true; 
   		} else {
   			$status = false;
   		}

   		echo json_encode(array('status' => $status));
    }

    public function index()
    {
        $data['title'] = "Sales";
        $this->load->view('Sales/template/header', $data);
        $this->load->view('sales/sales', $data);
        $this->load->view('Sales/template/footer');
    }
 	
    private function checkImg($id) {
      $pathe = 'uploads/menu/';
      if (file_exists($pathe.$id) && !empty($id)) {
        $url = $pathe.$id;
        return $url;
      } else {
        $url = $pathe.'defaults/img.jpg';
        return $url;
      }
    } 

 	public function ajax_detail() {
 		$data = $this->sm->getAll();
 		foreach ($data as $row) {
 			echo '<div class="col-6 col-sm-3">
              <div class="card">
                <label class="imagecheck mb-2">
                  <input type="checkbox" value="0" class="imagecheck-input" onclick="myAction(\''. "brg-" . $row->id_menu .'\', '. $this->session->userdata('id_pemesanan') .')" id="brg-'. $row->id_menu .'">
                  <figure class="imagecheck-figure">
                    <div style="background:url('. $this->checkImg($row->foto) .'); padding-top:70.23%; background-size: contain;" alt="'. $row->nama_menu .'" class="imagecheck-image"></div>
                  </figure>
                </label>
                <label class="text-center font-weight-bold mb-1">'. $row->nama_menu .'</label>
                <label class="text-center">Rp. '. $row->harga_jual .'</label>
              </div>
            </div>';
 		}
 	}

 	public function orderMenu() {
 		$idUser = $this->session->userdata('idUser');
 		$data = $this->sm->getOrderMenu($idUser);
 		$html = ""; $total_harga = 0;
 		foreach ($data->result() as $row) {
 			$html .= '<li class="media">
	                <img alt="image" class="mr-2 rounded" width="40" height="40" src="'. $this->checkImg($row->foto) .'">
	                <div class="media-body">
	                  <div class="media-title">'. $row->nama_menu .'</div>
	                  <div class="text-job text-muted">Rp. '. number_format($row->harga_jual, 0,',' ,'.') .'</div>
	                </div>
	                <div class="ml-3">
	                  <div class="row d-flex align-items-center">
	                    <span class="mr-1">X</span> 
	                      <input type="text" name="ae" class="form-control p-1" onkeypress="return isNumberKey(event);" style="width: 40px; text-align: center;" value="'. $row->jumlah_menu .'" onkeyup="update(\''. "brg-" . $row->id_menu .'\', '. $this->session->userdata('id_pemesanan') .', '. $row->harga_jual .', this.value)">
	                  </div>
	                </div>
	                <div class="media-cta ml-4">
	                  <div class="d-flex align-items-center float-right action-group">
	                    <span id="brg'. $row->id_menu .'">Rp. '. number_format(($row->harga_jual * $row->jumlah_menu), 0,',' ,'.') .'</span> 
	                    <div class="btn btn-danger px-2 ml-2" onclick="notifDel(\''. "brg-" . $row->id_menu .'\', '. $this->session->userdata('id_pemesanan') .')"><i class="fa fa-trash ml-1"></i></div>
	                  </div>
	                </div>
	              </li>';
			$total_harga += ($row->harga_jual * $row->jumlah_menu);
 		}
 		$output = array(
				 		'html' => $html,
				 		'total_harga' => number_format($total_harga, 0,',' ,'.'),
				 		'totalPD' => $data->num_rows()
				 	);
 		echo json_encode($output);
 	}

 	public function totalHarga() {
 		$idUser = $this->session->userdata('idUser');
 		$data = $this->sm->getHargaOrderMenu($idUser);
 		$total_harga = 0;
 		foreach ($data as $row) {
			$total_harga += ($row->harga_jual * $row->jumlah_menu);
 		}
 		return number_format($total_harga, 0,',' ,'.');
 	}

 	public function search() {
 		$name = $this->input->post('name');
 		$data = $this->sm->getWhere($name);
 		foreach ($data as $row) {
 			echo '<div class="col-6 col-sm-3">
              <div class="card">
                <label class="imagecheck mb-2">
                  <figure class="imagecheck-figure">
                  <input name="imagecheck" type="checkbox" value="0" class="imagecheck-input"  onclick="myAction(\''. "brg-" . $row->id_menu .'\', '. $this->session->userdata('id_pemesanan') .')" id="brg-'. $row->id_menu .'">
                    <img src="assets/img/news/img01.jpg" alt="'. $row->nama_menu .'" class="imagecheck-image">
                  </figure>
                </label>
                <label class="text-center font-weight-bold mb-1">'. $row->nama_menu .'</label>
                <label class="text-center">Rp. '. $row->harga_jual .'</label>
              </div>
            </div>';
 		}
 	}

 	public function insertPD($ib, $ip) {
 		if (!$this->sm->cekMenu($ib, $ip)) {
 			$hrgMenu = $this->sm->dataMenu($ib);
	 		$data = array('id_pemesanan' => $ip, 'id_menu' => $ib, 'harga_asli' => $hrgMenu->harga_jual , 'jumlah_menu' => 1);
	  		$query = $this->sm->insert_pemesanan_detail($data);

 			$status = true; 
 		} else {
 			$status = false;
 		}
 		echo json_encode(array('status' => $status));
  }

  public function deletePD($ib, $ip) {
 	  $this->sm->delete_pemesanan_detail($ib, $ip);
  }

  public function updatePD($ib, $ip, $harga, $jmlMenu) {
  	$data = array('harga_asli' => $harga, 'jumlah_menu' => $jmlMenu);
  	$where = array('id_menu' => $ib, 'id_pemesanan' => $ip);
 	  $this->sm->update_jumlah_pemesanan_detail($data, $where);

 		echo json_encode(array('totalHarga' => $this->totalHarga()));
  }
}