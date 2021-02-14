<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("transaksi_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
        $this->load->model("barang_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index($date = null)
    {
        if (isset($date)) {
            $data['data_barang'] = $this->barang_model->getTransaksiOnBarangByDate($date);
        }else{
            $data['data_barang'] = $this->barang_model->getTransaksiOnBarang();
        }
        
            
              
        // $data["data_barang"] = $this->barang_model->getByDay($date);
        // $data["data_transaksi"] = $this->transaksi_model->getAll();
        // $data["data_barang"] = $this->barang_model->getAll();
        // $data["data_barang"] = $this->barang_model->leftJoin();
        
        $this->load->view("admin/siswa/daily", $data);
    }

    public function selectByDate()
    {
        $post = $this->input->post();
        $date = $post["tanggal"];
        if ($date != null) {
            $data['data_barang'] = $this->barang_model->getTransaksiOnBarangByDate($date);
        }else{
            $data['data_barang'] = $this->barang_model->getTransaksiOnBarang();
        }
        $this->load->view("admin/siswa/daily", $data);
    }

    public function selectByDateMonthly()
    {
        $post = $this->input->post();
        $date = $post["tanggal"];
        if ($date != null) {
            $data['data_barang'] = $this->barang_model->getTransaksiOnBarangMonthlyByDate($date);
        }else{
            $data['data_barang'] = $this->barang_model->getTransaksiOnBarangMonthly();
        }
        $this->load->view("admin/siswa/weekly", $data);
    }
    

    public function monthly()
    {
        $data['data_barang'] = $this->barang_model->getTransaksiOnBarangMonthly();
        $this->load->view("admin/siswa/weekly", $data);
    }

    public function cetak()
    {
        $post = $this->input->post();
        $date = $post["tanggal"];
        if ($date != null) {
            $data['data_barang'] = $this->barang_model->getTransaksiOnBarangByDate($date);
        }else{
            $data['data_barang'] = $this->barang_model->getTransaksiOnBarang();
        }
        $this->load->view("admin/siswa/cetak1", $data);
    }

    public function cetak2()
    {
        $post = $this->input->post();
        $date = $post["tanggal"];
        if ($date != null) {
            $data['data_barang'] = $this->barang_model->getTransaksiOnBarangMonthlyByDate($date);
        }else{
            $data['data_barang'] = $this->barang_model->getTransaksiOnBarangMonthly();
        }
        $this->load->view("admin/siswa/cetak2", $data);
    }

    public function store()
    {
        $products=new Transaksi_model;
        $products->insert_transaksi();
        redirect(base_url('admin/siswa'));
    }

    public function store_monthly()
    {
        $products=new Transaksi_model;
        $products->insert_transaksi_monthly();
        redirect(base_url('admin/siswa/monthly'));
    }

    public function update()
    {
        $products=new Transaksi_model;
        $products->update();
        redirect(base_url('admin/siswa'));
    }

    public function update_monthly()
    {
        $products=new Transaksi_model;
        $products->update_monthly();
        redirect(base_url('admin/siswa/monthly'));
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

    public function deleteMonthly($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->transaksi_model->delete($id)) {
            redirect(site_url('admin/siswa/monthly'));
            $this->session->set_flashdata('Berhasil Di Hapus');
        }
    }

    public function deleteDaily($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->transaksi_model->deleteDaily($id)) {
            redirect(site_url('admin/siswa'));
            $this->session->set_flashdata('Berhasil Di Hapus');
        }
    }
}
