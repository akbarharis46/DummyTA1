<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AdminClient extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('curl');
        $this->load->model('admin_model');       

    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $this->load->view('header0');
        $this->load->view('bar');
        $this->load->view('admin/index', $data, FALSE);
        $this->load->view('footer');
    }

    public function indexproduksi()
    {
        $data['title'] = "Dashboard";
        $this->load->view('header0');
        $this->load->view('bar');
        $this->load->view('admin/index', $data, FALSE);
        $this->load->view('footer');
    }


    public function indexgudang()
    {
        $data['title'] = "Dashboard";
        $this->load->view('header0');
        $this->load->view('bar');
        $this->load->view('admin/index', $data, FALSE);
        $this->load->view('footer');
    }


    public function indexpengiriman()
    {
        $data['title'] = "Dashboard";
        $this->load->view('header1');
        $this->load->view('bar3');
        $this->load->view('staffpengiriman/index', $data, FALSE);
        $this->load->view('footer');
    }
}
?>