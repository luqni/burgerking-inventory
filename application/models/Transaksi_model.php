<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    private $_table = "data_transaksi";

    public $id_transaksi;
    public $cv;
    public $pack;
    public $ea;
    public $stok_op_name;
    public $transfer;
    public $endmonthly;
    public $actual;

    public function rules()
    {
        return [
            ['field' => 'cv',
            'label' => 'cv',
            'rules' => 'required'],

            ['field' => 'pack',
            'label' => 'Pack',
            'rules' => 'numeric'],
            
            ['field' => 'ea',
            'label' => 'EA',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_transaksi" => $id])->row();
    }

    public function getByDay($date)
    {
        return $this->db->get_where($this->_table, ["date" => $date])->result();
    }

    public function saveProduct($data){
        $query = $this->db->table('data_transaksi')->insert($data);
        return $query;
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_transaksi = uniqid();
        $this->id_barang = $post["id"];
		$this->cv = $post["cv"];
		$this->pack = $post["pack"];
        $this->ea = $post["ea"];
        $this->date = date("Y-m-d");
        $this->db->insert($this->_table, $this);
    }

    public function insert_transaksi()
    {   
        $stok_op_name =  $this->input->post('stok_op_name');
        $endmonthly = $this->input->post('endmonthly');
        $actual = $stok_op_name - $endmonthly;
        $pack =  $this->input->post('pack');
        $isi_pack =  $this->input->post('isi_pack');
        $ea = $pack * $isi_pack;
        $data = array(
            'id_barang' => $this->input->post('id_barang'),
            'pack' => $this->input->post('pack'),
            'ea' => $ea,
            'date' => date("Y-m-d"),
        );
        return $this->db->insert('data_transaksi', $data);
    }

    public function insert_transaksi_monthly()
    {   
        $stok_op_name =  $this->input->post('stok_op_name');
        $endmonthly = $this->input->post('endmonthly');
        $actual = $stok_op_name - $endmonthly;
        $pack =  $this->input->post('pack');
        $isi_pack =  $this->input->post('isi_pack');
        $ea = $pack * $isi_pack;
        $data = array(
            'id_barang' => $this->input->post('id_barang'),
            'pack' => $this->input->post('pack'),
            'ea' => $ea,
            'date' => date("Y-m-d"),
        );
        return $this->db->insert('data_transaksi_monthly', $data);
    }

    public function update()
    {
        $id =  $this->input->post('id_transaksi');
        $pack =  $this->input->post('pack');
        $isi_pack =  $this->input->post('isi_pack');
        $ea = $pack * $isi_pack;
        $data = array(
            'id_barang' => $this->input->post('id_barang'),
            'pack' => $this->input->post('pack'),
            'ea' => $ea,
            // 'date' => date("Y-m-d"),
        );

        $this->db->where('id_transaksi',$id);
        return $this->db->update('data_transaksi',$data);

        // $query = $this->db->table('data_transaksi')->update($data, array('id_transaksi' => $id));
        // return $query;
    }

    public function update_monthly()
    {
        $id =  $this->input->post('id_transaksi_monthly');
        $pack =  $this->input->post('pack');
        $isi_pack =  $this->input->post('isi_pack');
        $ea = $pack * $isi_pack;
        $data = array(
            'id_barang' => $this->input->post('id_barang'),
            'pack' => $this->input->post('pack'),
            'ea' => $ea,
            // 'date' => date("Y-m-d"),
        );

        $this->db->where('id_transaksi_monthly',$id);
        return $this->db->update('data_transaksi_monthly',$data);

        // $query = $this->db->table('data_transaksi')->update($data, array('id_transaksi' => $id));
        // return $query;
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_transaksi" => $id));
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
