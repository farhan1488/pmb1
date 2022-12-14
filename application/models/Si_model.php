<?php
defined('BASEPATH') OR exit('Not Allowed Access Direct');

Class Si_model extends CI_Model{
    public function getDataMahasiswa(){
        $this->db->order_by('id_pendaftar');
        // select * from mahasiswa
        $data = $this->db->get('pendaftar')->result();

        return $data;
    }

    public function getPeoples($limit, $start)
    {
        return $this->db->get('pendaftar', $limit, $start)->result();
    }

    public function countAllData()
    {
        return $this->db->get('pendaftar')->num_rows();
    }
    public function prodi()
    {
        return $this->db->get('prodi')->result_array();;
    }
    public function mandiritabel()
    {
        return $this->db->get('mandiri_prestasi')->result_array();;
    }

    public function listProdi()
    {
        $this->db->select('prodi.id_prodi, prodi.nama_prodi, prodi.jenjang, fakultas.nama_fakultas');
        $this->db->from('prodi');
        $this->db->join('fakultas','fakultas.id_fakultas = prodi.id_fakultas');
        return $this->db->get()->result();
    }

    //model buat highchart data pendaftar prodi 1
    public function PendaftarProdi1($id_prodi)
    {
        $result = 0;
        $this->db->where('id_prodi1', $id_prodi);
        $data = $this->db->get('pendaftar')->result_array();
        if (!empty($data)){
            $result = count($data);
        }
        return $result;
    }

    public function PendaftarProdi2($id_prodi)
    {
        $result = 0;
        $this->db->where('id_prodi2', $id_prodi);
        $data = $this->db->get('pendaftar')->result_array();
        if (!empty($data)){
            $result = count($data);
        }
        return $result;
    }

    public function mandiri()
    {
        $data = "SELECT jenis_prestasi, COUNT(*) AS jumlah FROM mandiri_prestasi GROUP BY jenis_prestasi
        ORDER by jenis_prestasi";

        $hasil = $this->db->query($data);
        if($hasil)
        {
            return $hasil->result();
        }else{
            return 0;
        }
    }

    public function jalur()
    {
        $data = "SELECT jalur_daftar.nama_jalur, pendaftar.id_jalur, COUNT(*) AS jumlah FROM pendaftar JOIN jalur_daftar ON jalur_daftar.id_jalur = pendaftar.id_jalur GROUP BY id_jalur";

        $hasil = $this->db->query($data);
        if($hasil)
        {
            return $hasil->result();
        }else{
            return 0;
        }
    }
    public function bank()
    {
        $data = "SELECT bank.nama_bank, SUM(pendaftar.nominal_bayar) AS Total_Pendapatan FROM `pendaftar`JOIN bank ON bank.id_bank = pendaftar.id_bank GROUP BY pendaftar.id_bank
        ";
        $hasil = $this->db->query($data);
        if($hasil)
        {
            return $hasil->result();
        }else{
            return 0;
        }
    }

    public function ket_bayar()
    {
        $data = "SELECT COUNT(id_pendaftar) AS jumlah, SUM(pendaftar.nominal_bayar) AS total, pendaftar.id_bank, pendaftar.ket_bayar, bank.nama_bank FROM pendaftar JOIN bank ON pendaftar.id_bank = bank.id_bank GROUP BY id_bank,ket_bayar";
        $hasil = $this->db->query($data);
        if($hasil)
        {
            return $hasil->result();
        }else{
            return 0;
        }
    }
    public function pendaftarBank()
    {
        $this->db->select(['COUNT(id_pendaftar) AS jumlah, SUM(pendaftar.nominal_bayar) AS total, pendaftar.id_bank, pendaftar.ket_bayar, bank.nama_bank']);
        $this->db->join('bank','pendaftar.id_bank = bank.id_bank');
        $this->db->where_in('id_jalur','[2,3]');
        $this->db->group_by(['id_bank','ket_bayar']);
        $data = $this->db->get('pendaftar')->result_array();
        return $data;
    }

    public function listbank()
    {
        $data = $this->db->get('bank')->result_array();
        return $data;
    }


}

?>
