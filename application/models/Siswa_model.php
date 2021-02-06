<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    private $_table = "data_siswa";

    public $id;
    public $nis;
    public $nisn;
    public $nama_siswa;
    public $tmp_lahir_siswa;
    public $tgl_lahir_siswa;
    public $alamat_siswa;
    public $anak_ke;
    public $saudara_kandung;
    public $nama_ayah;
    public $tmp_lahir_ayah;
    public $tgl_lahir_ayah;
    public $pendidikan_tinggi_ayah;
    public $pekerjaan_ayah;
    public $nomor_hp_ayah;
    public $nama_ibu;
    public $tmp_lahir_ibu;
    public $tgl_lahir_ibu;
    public $pendidikan_tertinggi_ibu;
    public $pekerjaan_ibu;
    public $nomor_hp_ibu;
    public $kelompok;
    public $tahun_ajar;

    public function rules()
    {
        return [
            ['field' => 'nama_siswa',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'nama_ayah',
            'label' => 'Ayah',
            'rules' => 'required'],
            
            ['field' => 'nama_ibu',
            'label' => 'Ibu',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id = hexdec(uniqid());
        $this->nis = $post["nis"];
        $this->nisn = $post["nisn"];
        $this->nama_siswa = $post["nama_siswa"];
        $this->tmp_lahir_siswa = $post["tmp_lahir_siswa"];
        $this->tgl_lahir_siswa = $post["tgl_lahir_siswa"];
        $this->alamat_siswa = $post["alamat_siswa"];
        $this->anak_ke = $post["anak_ke"];
        $this->saudara_kandung = $post["saudara_kandung"];
        $this->nama_ayah = $post["nama_ayah"];
        $this->tmp_lahir_ayah = $post["tmp_lahir_ayah"];
        $this->tgl_lahir_ayah = $post["tgl_lahir_ayah"];
        $this->pendidikan_tinggi_ayah = $post["pendidikan_tinggi_ayah"];
        $this->pekerjaan_ayah = $post["pekerjaan_ayah"];
        $this->nomor_hp_ayah = $post["nomor_hp_ayah"];
        $this->nama_ibu = $post["nama_ibu"];
        $this->tmp_lahir_ibu = $post["tmp_lahir_ibu"];
        $this->tgl_lahir_ibu = $post["tgl_lahir_ibu"];
        $this->pendidikan_tertinggi_ibu = $post["pendidikan_tertinggi_ibu"];
        $this->pekerjaan_ibu = $post["pekerjaan_ibu"];
        $this->nomor_hp_ibu = $post["nomor_hp_ibu"];
        $this->kelompok = $post["kelompok"];
        $this->tahun_ajar = $post["tahun_ajar"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
        $this->nis = $post["nis"];
        $this->nisn = $post["nisn"];
        $this->nama_siswa = $post["nama_siswa"];
		$this->tmp_lahir_siswa = $post["tmp_lahir_siswa"];
        $this->alamat_siswa = $post["alamat_siswa"];
        $this->anak_ke = $post["anak_ke"];
        $this->saudara_kandung = $post["saudara_kandung"];
        $this->nama_ayah = $post["nama_ayah"];
        $this->tmp_lahir_ayah = $post["tmp_lahir_ayah"];
        $this->tgl_lahir_ayah = $post["tgl_lahir_ayah"];
        $this->pendidikan_tinggi_ayah = $post["pendidikan_tinggi_ayah"];
        $this->pekerjaan_ayah = $post["pekerjaan_ayah"];
        $this->nomor_hp_ayah = $post["nomor_hp_ayah"];
        $this->nama_ibu = $post["nama_ibu"];
        $this->tmp_lahir_ibu = $post["tmp_lahir_ibu"];
        $this->tgl_lahir_ibu = $post["tgl_lahir_ibu"];
        $this->pendidikan_tertinggi_ibu = $post["pendidikan_tertinggi_ibu"];
        $this->pekerjaan_ibu = $post["pekerjaan_ibu"];
        $this->nomor_hp_ibu = $post["nomor_hp_ibu"];
        $this->kelompok = $post["kelompok"];
        $this->tahun_ajar = $post["tahun_ajar"];

        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
	}

}
