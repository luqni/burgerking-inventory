<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transfer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("transfer_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index($date = null)
    {
        $data['data_transfer'] = $this->transfer_model->getAll();
        $data['cabang'] = $this->transfer_model->getCabang();
        $this->load->view("admin/transfer/list", $data);
    }

    public function selectByDate()
    {
        $post = $this->input->post();
        $date = $post["tanggal"];
        if ($date != null) {
            $data['data_transfer'] = $this->transfer_model->getTransferOnBarangByDate($date);
            $data['cabang'] = $this->transfer_model->getCabang();
        }else{
            $data['data_transfer'] = $this->transfer_model->getAll();
            $data['cabang'] = $this->transfer_model->getCabang();
        }
        $this->load->view("admin/transfer/list", $data);
    }

    public function cetak()
    {
        $post = $this->input->post();
        $date = $post["tanggal"];
        if ($date != null) {
            $data['data_transfer'] = $this->transfer_model->getTransferOnBarangByDate($date);
            $data['cabang'] = $this->transfer_model->getCabang();
        }else{
            $data['data_transfer'] = $this->transfer_model->getAll();
            $data['cabang'] = $this->transfer_model->getCabang();
        }
        $this->load->view("admin/siswa/cetak3", $data);
    }


    public function store_transfer()
    {
        $products=new Transfer_model;
        $products->insert_transfer();
        redirect(base_url('admin/transfer'));
    }

    public function update()
    {
        $products=new Transfer_model;
        $products->update();
        redirect(base_url('admin/transfer'));
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
        
        if ($this->siswa_model->delete($id)) {
            redirect(site_url('admin/siswa'));
            $this->session->set_flashdata('Berhasil Di Hapus');
        }
    }
}
