<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("cabang_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index($date = null)
    {
        $data['data_cabang'] = $this->cabang_model->getAll();
        $this->load->view("admin/cabang/list", $data);
    }


    public function store_cabang()
    {
        $products=new Cabang_model;
        $products->insert_cabang();
        redirect(base_url('admin/cabang'));
    }

    public function update()
    {
        $products=new Cabang_model;
        $products->update();
        redirect(base_url('admin/cabang'));
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
        
        if ($this->cabang_model->delete($id)) {
            redirect(site_url('admin/cabang'));
            $this->session->set_flashdata('Berhasil Di Hapus');
        }
    }
}
