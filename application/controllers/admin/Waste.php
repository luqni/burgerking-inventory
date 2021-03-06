<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Waste extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("waste_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index($date = null)
    {
        $data['data_waste'] = $this->waste_model->getAll();
        $this->load->view("admin/waste/list", $data);
    }

    public function selectByDate()
    {
        $post = $this->input->post();
        $date = $post["tanggal"];
        if ($date != null) {
            $data['data_waste'] = $this->waste_model->getWasteByDate($date);
        }else{
            $data['data_waste'] = $this->waste_model->getAll();  
        }
        $this->load->view("admin/waste/list", $data);
    }

    public function cetak()
    {
        $post = $this->input->post();
        $date = $post["tanggal"];
        if ($date != null) {
            $data['data_waste'] = $this->waste_model->getWasteByDate($date);
        }else{
            $data['data_waste'] = $this->waste_model->getAll();  
        }
        $this->load->view("admin/siswa/cetak4", $data);
    }


    public function store_waste()
    {
        $products=new Waste_model;
        $products->insert_waste();
        redirect(base_url('admin/waste'));
    }

    public function update()
    {
        $products=new Waste_model;
        $products->update();
        redirect(base_url('admin/waste'));
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/siswa');
       
        $siswa = $this->transaksi_model;
        $validation = $this->form_validation;
        $validation->set_rules($siswa->rules());
        $data["siswa"] = $siswa->getById($id);
        $siswa->update();
        $this->session->set_flashdata('Berhasil disimpan');

        
        if (!$data["siswa"]) show_404();
        
        $this->load->view("admin/siswa/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->waste_model->delete($id)) {
            redirect(site_url('admin/waste'));
            $this->session->set_flashdata('Berhasil Di Hapus');
        }
    }
}
