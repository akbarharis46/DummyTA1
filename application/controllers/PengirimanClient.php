<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PengirimanClient extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('curl');
        
        $this->API = "http://localhost:8080/dummyTA/pengiriman";
    }

    public function index()
    {
        $data['pengiriman'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "pengiriman";
        $this->load->view('header0');
        $this->load->view('bar');
        $this->load->view('data/pengiriman', $data);
        $this->load->view('footer');
    }
    
    public function post()
    {
      $data['title'] = "Tambah Data pengiriman";
      $this->load->view('header0');
      $this->load->view('bar');
      $this->load->view('data/post/pengiriman', $data);
      $this->load->view('footer');
    }
  
    public function post_process()
    {
        $data = array(
            'nama_pengirim'                   => $this->input->post('nama_pengirim'),
            'tujuan'                         => $this->input->post('tujuan'),
            'jumlah'                         => $this->input->post('jumlah'),
            'jenis_kendaraan'                => $this->input->post('jenis_kendaraan'),
            'nomor_kendaraan'                => $this->input->post('nomor_kendaraan'),
            'tanggal'                        => $this->input->post('tanggal'),   
        );
        $insert =  $this->curl->simple_post($this->API,$data);
        if ($insert) {
            echo"berhasil";
            //$this->session->set_flashdata('result', 'Data pengiriman Berhasil Ditambahkan');
        } else {
            echo"gagal ";
            //$this->session->set_flashdata('result', 'Data pengiriman Gagal Ditambahkan');
        }
        // print_r($insert);
        //  exit;
        redirect('pengirimanclient');
      }
    
    public function put()
    {
        $params = array('id_pengiriman' =>  $this->uri->segment(3));
        $data['pengiriman'] = json_decode($this->curl->simple_get($this->API, $params));
        $data['title'] = "Edit Data pengiriman";
        $this->load->view('header0');
        $this->load->view('bar');
        $this->load->view('data/put/pengiriman', $data);
        $this->load->view('footer');

    }
    public function put_process()
    {
        $data = array(
            'id_pengiriman'                  => $this->input->post('id_pengiriman'),
            'nama_pengirim'                  => $this->input->post('nama_pengirim'),
            'tujuan'                         => $this->input->post('tujuan'),
            'jumlah'                         => $this->input->post('jumlah'),
            'jenis_kendaraan'                => $this->input->post('jenis_kendaraan'),
            'nomor_kendaraan'                => $this->input->post('nomor_kendaraan'),
            'tanggal'                        => $this->input->post('tanggal'),
            
        );
        
        $update =  $this->curl->simple_put($this->API, $data, array(CURLOPT_BUFFERSIZE => 10));
        if ($update) {
            echo"berhasil";
            // $this->session->set_flashdata('result', 'Update Data pengiriman Berhasil');
        } else {
            echo"gagal";
            // $this->session->set_flashdata('result', 'Update Data pengiriman Gagal');
        }
        // print_r($update);
        // die;
        redirect('pengirimanclient');
    }
    public function delete()
    {
        $params = array('id_pengiriman' =>  $this->uri->segment(3));
        $delete =  $this->curl->simple_delete($this->API, $params);
        if ($delete) {
            $this->session->set_flashdata('result', 'Hapus Data Pengiriman Berhasil');
        } else {
            $this->session->set_flashdata('result', 'Hapus Data Pengiriman Gagal');
        }
        // print_r($delete);
        // die;
        redirect('pengirimanclient');
    }
}
?>