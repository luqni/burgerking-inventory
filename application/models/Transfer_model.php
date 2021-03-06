<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Transfer_model extends CI_Model
{
    private $_table = "transfer";
    private $_table2 = "cabang";

    public $id;
    public $id_cabang;
    public $item_name;
    public $qty;
    public $approved;
    public $date;
    

    public function rules()
    {
        return [
            ['field' => 'id_cabang',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'item_name',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'qty',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'approved',
            'label' => 'Name',
            'rules' => 'required'],
        ];
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('transfer');
        $this->db->join('cabang', 'cabang.id= transfer.id_cabang','left');
        $query = $this->db->get();
        return $query->result();
    }

    public function getCabang()
    {
        return $this->db->get($this->_table2)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["product_id" => $id])->row();
    }

    function getTransferOnBarangByDate()
    {
        $post = $this->input->post();
        $date = $post["tanggal"];

        $this->db->select('*');
        $this->db->from('transfer');
        $this->db->join('cabang', 'cabang.id= transfer.id_cabang','left');
        $this->db->where('transfer.date', $date);
        $query = $this->db->get();
        return $query->result();
    }    


    public function insert_transfer()
    {   
        
        $data = array(
            'id_cabang' => $this->input->post('id_cabang'),
            'item_name' => $this->input->post('item_name'),
            'qty' => $this->input->post('qty'),
            'approved' => $this->input->post('approved'),
            'date' => date("Y-m-d"),
            
        );
        return $this->db->insert('transfer', $data);
    }


    public function update()
    {
        $id =  $this->input->post('id_transfer');
        $id_cabang =  $this->input->post('id_cabang');
        $item_name =  $this->input->post('item_name');
        $qty =  $this->input->post('qty');
        $approved =  $this->input->post('approved');
        $data = array(
            'id_cabang' => $this->input->post('id_cabang'),
            'item_name' => $this->input->post('item_name'),
            'qty' => $this->input->post('qty'),
            'approved' => $this->input->post('approved'),
        );

        $this->db->where('id_transfer',$id);
        return $this->db->update('transfer',$data);

    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_transfer" => $id));
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
