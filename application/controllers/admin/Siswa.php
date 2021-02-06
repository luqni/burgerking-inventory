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
        // if (!isset($id))$date = date("Y-m-d");
        
            
              
        // $data["data_barang"] = $this->barang_model->getByDay($date);
        // $data["data_transaksi"] = $this->transaksi_model->getAll();
        // $data["data_barang"] = $this->barang_model->getAll();
        // $data["data_barang"] = $this->barang_model->leftJoin();
        $data['data_barang'] = $this->barang_model->getTransaksiOnBarang();
        $this->load->view("admin/siswa/list", $data);
    }

    public function weekly()
    {
        $data["data_barang"] = $this->barang_model->getAll();
        $this->load->view("admin/siswa/list", $data);
    }

    public function monthly()
    {
        $data["data_barang"] = $this->barang_model->getAll();
        $this->load->view("admin/siswa/list", $data);
    }

    public function add()
    {
        $siswa = $this->siswa_model;
        $validation = $this->form_validation;
        $validation->set_rules($siswa->rules());

        if ($validation->run()) {
            $siswa->save();
            $this->session->set_flashdata('Berhasil disimpan');
        }

        $this->load->view("admin/siswa/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/siswa');
       
        $siswa = $this->siswa_model;
        $validation = $this->form_validation;
        $validation->set_rules($siswa->rules());

        if ($validation->run()) {
            $siswa->update();
            $this->session->set_flashdata('Berhasil disimpan');
        }

        $data["siswa"] = $siswa->getById($id);
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
