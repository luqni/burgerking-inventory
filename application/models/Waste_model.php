<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Waste_model extends CI_Model
{
    private $_table = "waste";

    public $id;
    public $product;
    public $qty;
    public $keterangan;
    

    public function rules()
    {
        return [
            ['field' => 'product',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'qty',
            'label' => 'Price',
            'rules' => 'numeric'],
            
            ['field' => 'keterangan',
            'label' => 'Description',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
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


    public function insert_waste()
    {   
        
        $data = array(
            'product' => $this->input->post('product'),
            'qty' => $this->input->post('qty'),
            'keterangan' => $this->input->post('keterangan'),
            
        );
        return $this->db->insert('waste', $data);
    }


    public function update()
    {
        $id =  $this->input->post('id');
        $product =  $this->input->post('product');
        $qty =  $this->input->post('qty');
        $keterangan =  $this->input->post('keterangan');
        
        $data = array(
            'product' => $this->input->post('product'),
            'qty' => $this->input->post('qty'),
            'keterangan' => $this->input->post('keterangan'),
        );

        $this->db->where('id',$id);
        return $this->db->update('waste',$data);

    }

    function getWasteByDate()
    {
        $post = $this->input->post();
        $date = $post["tanggal"];

        $this->db->select('*');
        $this->db->from('waste');
        $this->db->where('date', $date);
        $query = $this->db->get();
        return $query->result();
    }

    public function delete($id)
    {
		// $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id" => $id));
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
