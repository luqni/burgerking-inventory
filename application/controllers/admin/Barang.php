<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("barang_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index($date = null)
    {
        $data['data_barang'] = $this->barang_model->getAll();
        $data['kategori'] = $this->barang_model->getKategori();
        $this->load->view("admin/barang/list", $data);
    }

    public function daily()
    {
        $data['data_barang'] = $this->barang_model->getTransaksiOnBarang();
        $this->load->view("admin/siswa/daily", $data);
    }

    public function weekly()
    {
        $data['data_barang'] = $this->barang_model->getTransaksiOnBarang();
        $this->load->view("admin/siswa/weekly", $data);
    }

    public function store()
    {
        $products=new Transaksi_model;
        $products->insert_transaksi();
        redirect(base_url('admin/siswa'));
    }

    public function store_barang()
    {
        $products=new Barang_model;
        $products->insert_barang();
        redirect(base_url('admin/barang'));
    }

    public function update()
    {
        $products=new Barang_model;
        $products->update();
        redirect(base_url('admin/barang'));
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
        
        if ($this->barang_model->delete($id)) {
            redirect(site_url('admin/barang'));
            $this->session->set_flashdata('Berhasil Di Hapus');
        }
    }
}
