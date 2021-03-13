<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class LaporanBahanBakuModel extends CI_Model {
 
	public function __construct()
	{
	    parent::__construct();
	    $this->load->database();
	}

    public function ajax_detail_id($id)
    {
        $this->db->select('*');
		    $this->db->from('bahan_baku');
        $this->db->like('tgl_ubah', $id);
        $query = $this->db->get();
 
        return $query->result();
    }	

  //   public function puall($tgl_mulai, $tgl_akhir)
  //   {	
  //   	// SELECT a.id_pemesanan, b.nama, a.tgl_ubah FROM pemesanan a LEFT JOIN user b ON b.id_user = a.id_user
  //       $this->db->select('a.id_pemesanan, b.nama, a.tgl_ubah');
		// $this->db->join('user b', 'b.id_user = a.id_user', 'left');
		// $this->db->from($this->table . ' a');
		// $this->db->where('a.tgl_ubah >=', $tgl_mulai . ' 00:00:00');
		// $this->db->where('a.tgl_ubah <=', $tgl_akhir . ' 23:59:59');
  //       $query = $this->db->get();
 
  //       return $query->result();
  //   }
}