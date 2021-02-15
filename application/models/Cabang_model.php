<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang_model extends CI_Model
{
    private $_table = "cabang";

    public $id;
    public $nama_cabang;
    

    public function rules()
    {
        return [
            ['field' => 'nama_cabang',
            'label' => 'Name',
            'rules' => 'required'],
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

    


    public function insert_cabang()
    {   
        
        $data = array(
            'nama_cabang' => $this->input->post('nama_cabang'),
            
        );
        return $this->db->insert('cabang', $data);
    }


    public function update()
    {
        $id =  $this->input->post('id');
        $nama_cabang =  $this->input->post('nama_cabang');
        $data = array(
            'nama_cabang' => $this->input->post('nama_cabang'),
        );

        $this->db->where('id',$id);
        return $this->db->update('cabang',$data);

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
