<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class DataTransaksiModel extends CI_Model {
 
    var $table = 'pemesanan';
    var $column_order = array(null, 'id_pemesanan', 'total_harga', 'diskon', '(total_harga-diskon)', 'tgl_ubah'); //set column field database for datatable orderable
    var $column_search = array('CONCAT("NOTA-", id_pemesanan)', 'total_harga', 'diskon', '(total_harga-diskon)', 'tgl_ubah'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('id_pemesanan' => 'desc'); // default order 
 
	public function __construct()
	{
	    parent::__construct();
	    $this->load->database();
	}

    private function _get_datatables_query()
    {
         
        // SELECT a.id_pemesanan, a.id_user, a.total_harga, a.diskon, a.tgl_ubah FROM pemesanan a LEFT JOIN pemesanan_detail b ON a.id_pemesanan = b.id_pemesanan WHERE a.id_user = 132
        $this->db->select('id_pemesanan, CONCAT("NOTA-", id_pemesanan) as nota, id_user, total_harga, diskon, (total_harga-diskon) as hrgDiskon, tgl_ubah');
		$this->db->from($this->table);
		$this->db->where('id_user', $this->session->userdata('idUser'));
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
 
    public function pemesanan_id($id)
    {	
    	// SELECT a.id_pemesanan, b.nama, a.total_harga, a.diskon, (a.total_harga - a.diskon) as hrgDiskon, a.tgl_ubah FROM pemesanan a LEFT JOIN user b ON b.id_user = a.id_user WHERE a.id_pemesanan = 2
        $this->db->select('a.id_pemesanan, a.status, b.nama, a.total_harga, a.diskon, (a.total_harga - a.diskon) as hrgDiskon, a.tgl_ubah');
		$this->db->join('user b', 'b.id_user = a.id_user', 'left');
		$this->db->from($this->table . ' a');
        $this->db->where('a.id_pemesanan',$id);
        $query = $this->db->get();
 
        return $query->result();
    }

    public function detail_pemesanan_id($id)
    {	
    	// SELECT a.id_pemesanan, b.nama_barang, a.jumlah_barang, a.harga_asli FROM pemesanan_detail a LEFT JOIN barang b ON b.id_barang = a.id_barang WHERE a.id_pemesanan = 2
        $this->db->select('a.id_pemesanan, b.nama_barang, a.jumlah_barang, a.harga_asli');
		$this->db->join('barang b', 'b.id_barang = a.id_barang', 'left');
		$this->db->from('pemesanan_detail a');
        $this->db->where('a.id_pemesanan', $id);
        $query = $this->db->get();
 
        return $query;
    }
}