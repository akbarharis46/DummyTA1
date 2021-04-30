<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DetailClient extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('curl');
        
        $this->API = "http://localhost:8080/dummyTA/detail";
    }

    public function index()
    {
        
        $data['detail'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "Kategori";

        $this->load->view('header0');
        $this->load->view('bar');
        $this->load->view('data/barang_keluar', $data);
        $this->load->view('footer');

    }


    public function indexproduksi()
    {
        $data['detail'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "Kategori";
        $this->load->view('header1');
        $this->load->view('bar1');
        $this->load->view('staffproduksi/barang_keluar', $data);
        $this->load->view('footer');

    }
    public function indexgudang()
    {
        $data['detail'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "Kategori";
        $this->load->view('header1');
        $this->load->view('bar2');
        $this->load->view('staffgudang/barang_keluar', $data);
        $this->load->view('footer');

    }
    public function indexpengiriman()
    {
        $data['detail'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "Kategori";
        $this->load->view('header1');
        $this->load->view('bar3');
        $this->load->view('staffpengiriman/barang_keluar', $data);
        $this->load->view('footer');

    }
    


public function delete()
{
    $params = array('id_detailpengiriman' =>  $this->uri->segment(3));
    $delete =  $this->curl->simple_delete($this->API, $params);
    if ($delete) {
        $this->session->set_flashdata('result', 'Hapus Data produksi Berhasil');
    } else {
        $this->session->set_flashdata('result', 'Hapus Data produksi Gagal');
    }
    // print_r($delete);
    // die;
    redirect('detailclient/index');
}



public function deletestaffpengiriman()
{
    $params = array('id_detailpengiriman' =>  $this->uri->segment(3));
    $delete =  $this->curl->simple_delete($this->API, $params);
    if ($delete) {
        $this->session->set_flashdata('result', 'Hapus Data produksi Berhasil');
    } else {
        $this->session->set_flashdata('result', 'Hapus Data produksi Gagal');
    }
    // print_r($delete);
    // die;
    redirect('detailclient/indexpengiriman');
}

    


}