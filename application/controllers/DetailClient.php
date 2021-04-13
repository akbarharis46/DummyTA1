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
}