<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    private $_table = "data_barang";
    private $_table2 = "data_transaksi";
    private $_table3 = "kategori_barang";

    public $id;
    public $kode;
    public $item_name;
    public $id_kategori;
    

    public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'price',
            'label' => 'Price',
            'rules' => 'numeric'],
            
            ['field' => 'description',
            'label' => 'Description',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('data_barang');
        $this->db->join('kategori_barang', 'kategori_barang.id = data_barang.id_kategori');
        $query = $this->db->get();
        return $query->result();
    }

    public function getKategori()
    {
        return $this->db->get($this->_table3)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["product_id" => $id])->row();
    }

    public function getByDay($date)
    {
        return $this->db->get_where($this->_table, ["date" => $date])->result();
    }

    function getTransaksiOnBarang()
    {
        $this->db->select('*');
        $this->db->from('data_barang');
        $this->db->join('data_transaksi', 'data_transaksi.id_barang = data_barang.id_barang', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    function getTransaksiOnBarangByDate()
    {
        $post = $this->input->post();
        $date = $post["tanggal"];

        $this->db->select('*');
        $this->db->from('data_barang');
        $this->db->join('data_transaksi', 'data_transaksi.id_barang = data_barang.id_barang');
        $this->db->where('data_transaksi.date', $date);
        $query = $this->db->get();
        return $query->result();
    }

    function getTransaksiOnBarangMonthly()
    {
        $this->db->select('*');
        $this->db->from('data_barang');
        $this->db->join('data_transaksi_monthly', 'data_transaksi_monthly.id_barang = data_barang.id_barang', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    function getTransaksiOnBarangMonthlyByDate()
    {
        $post = $this->input->post();
        $date = $post["tanggal"];

        $this->db->select('*');
        $this->db->from('data_barang');
        $this->db->join('data_transaksi_monthly', 'data_transaksi_monthly.id_barang = data_barang.id_barang');
        $this->db->where('data_transaksi_monthly.date', $date);
        $query = $this->db->get();
        return $query->result();
    }

    public function insert_barang()
    {   
        
        $data = array(
            'kode' => $this->input->post('kode'),
            'item_name' => $this->input->post('item_name'),
            'id_kategori' => $this->input->post('id_kategori'),
            
        );
        return $this->db->insert('data_barang', $data);
    }

    public function save()
    {
        $post = $this->input->post();
        $this->product_id = uniqid();
        $this->name = $post["name"];
		$this->price = $post["price"];
		$this->image = $this->_uploadImage();
        $this->description = $post["description"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $id =  $this->input->post('id_barang');
        $kode =  $this->input->post('kode');
        $item_name =  $this->input->post('item_name');
        $isi_pack =  $this->input->post('isi_pack');
        $id_kategori =  $this->input->post('id_kategori');
        $data = array(
            'kode' => $this->input->post('kode'),
            'item_name' => $this->input->post('item_name'),
            'isi_pack' => $this->input->post('isi_pack'),
            'id_kategori' => $this->input->post('id_kategori'),
        );

        $this->db->where('id_barang',$id);
        return $this->db->update('data_barang',$data);

    }

    public function delete($id)
    {
		
        return $this->db->delete($this->_table, array("id_barang" => $id));
	}
	
	private function _uploadImage()
	{
		$config['upload_path']          = './upload/product/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $this->product_id;
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			return $this->upload->data("file_name");
		}
		
		return "default.jpg";
	}

	private function _deleteImage($id)
	{
		$product = $this->getById($id);
		if ($product->image != "default.jpg") {
			$filename = explode(".", $product->image)[0];
			return array_map('unlink', glob(FCPATH."upload/product/$filename.*"));
		}
	}

}
