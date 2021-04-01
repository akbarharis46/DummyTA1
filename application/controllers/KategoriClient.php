<?php

defined('BASEPATH') or exit('No direct script access allowed');

class KategoriClient extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('curl');
        
        $this->API = "http://localhost:8080/dummyTA/kategori";
    }

    public function index()
    {
        $data['kategori'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "Kategori";
        $this->load->view('header0');
        $this->load->view('bar');
        $this->load->view('data/kategori', $data);
        $this->load->view('footer');
    }

    public function index1()
    {
        $data['kategori'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "kategori";
        $this->load->view('header1');
        $this->load->view('bar1');
        $this->load->view('staffproduksi/kategori', $data);
        $this->load->view('footer');
    }

    public function index2()
    {
        $data['kategori'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "kategori";
        $this->load->view('header1');
        $this->load->view('bar2');
        $this->load->view('staffgudang/kategori', $data);
        $this->load->view('footer');
    }


    public function index3()
    {
        $data['kategori'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "kategori";
        $this->load->view('header1');
        $this->load->view('bar3');
        $this->load->view('staffpengiriman/kategori', $data);
        $this->load->view('footer');
    }
    
    public function post()
    {
      $data['title'] = "Tambah Data Kategori";
      $this->load->view('header0');
      $this->load->view('bar');
      $this->load->view('data/post/kategori', $data);
      $this->load->view('footer');
    }

    public function post1()
    {
      $data['title'] = "Tambah Data Kategori";
      $this->load->view('header1');
      $this->load->view('bar2');
      $this->load->view('staffgudang/postkategori', $data);
      $this->load->view('footer');
    }



  
    public function post_process()
    {
        $data = array(
            'nama_kategori'                   => $this->input->post('nama_kategori'),
     
        );
        $insert =  $this->curl->simple_post($this->API,$data);
        if ($insert) {
            // echo"berhasil";
            $this->session->set_flashdata('result', 'Data Kategori Berhasil Ditambahkan');
        } else {
            // echo"gagal berhasil";
            $this->session->set_flashdata('result', 'Data Kategori Gagal Ditambahkan');
        }
        // print_r($insert);
        // die;
        redirect('kategoriclient');
      }



      public function post_process1()
    {
        $data = array(
            'nama_kategori'                   => $this->input->post('nama_kategori'),
     
        );
        $insert =  $this->curl->simple_post($this->API,$data);
        if ($insert) {
            // echo"berhasil";
            $this->session->set_flashdata('result', 'Data Kategori Berhasil Ditambahkan');
        } else {
            // echo"gagal berhasil";
            $this->session->set_flashdata('result', 'Data Kategori Gagal Ditambahkan');
        }
        // print_r($insert);
        // die;
        redirect('kategoriclient/index2');
      }




    
    public function put()
    {
        $params = array('id_kategori' =>  $this->uri->segment(3));
        $data['kategori'] = json_decode($this->curl->simple_get($this->API, $params));
        $data['title'] = "Edit Data Kategori";
        $this->load->view('header0');
        $this->load->view('bar');
        $this->load->view('data/put/kategori', $data);
        $this->load->view('footer');

    }



    public function put1()
    {
        $params = array('id_kategori' =>  $this->uri->segment(3));
        $data['kategori'] = json_decode($this->curl->simple_get($this->API, $params));
        $data['title'] = "Edit Data Kategori";
        $this->load->view('header1');
        $this->load->view('bar2');
        $this->load->view('staffgudang/putkategori', $data);
        $this->load->view('footer');
        
    }


    
    public function put_process()
    {
        $data = array(
            'id_kategori'                   => $this->input->post('id_kategori'),
            'nama_kategori'                   => $this->input->post('nama_kategori'),
        );
        
        $update =  $this->curl->simple_put($this->API, $data, array(CURLOPT_BUFFERSIZE => 10));
        if ($update) {
            echo"berhasil";
            // $this->session->set_flashdata('result', 'Update Data kategori Berhasil');
        } else {
            echo"gagal";
            // $this->session->set_flashdata('result', 'Update Data kategori Gagal');
        }
        // print_r($update);
        // die;
        redirect('kategoriclient');
    }

    public function put_process1()
    {
        $data = array(
            'id_kategori'                   => $this->input->post('id_kategori'),
            'nama_kategori'                   => $this->input->post('nama_kategori'),
        );
        
        $update =  $this->curl->simple_put($this->API, $data, array(CURLOPT_BUFFERSIZE => 10));
        if ($update) {
            echo"berhasil";
            // $this->session->set_flashdata('result', 'Update Data kategori Berhasil');
        } else {
            echo"gagal";
            // $this->session->set_flashdata('result', 'Update Data kategori Gagal');
        }
        // print_r($update);
        // die;
        redirect('kategoriclient/index2');
    }


    public function delete()
    {
        $params = array('id_kategori' =>  $this->uri->segment(3));
        $delete =  $this->curl->simple_delete($this->API, $params);
        if ($delete) {
            $this->session->set_flashdata('result', 'Hapus Data kategori Berhasil');
        } else {
            $this->session->set_flashdata('result', 'Hapus Data kategori Gagal');
        }
        // print_r($delete);
        // die;
        redirect('kategoriclient');
    }


    public function delete1()
    {
        $params = array('id_kategori' =>  $this->uri->segment(3));
        $delete =  $this->curl->simple_delete($this->API, $params);
        if ($delete) {
            $this->session->set_flashdata('result', 'Hapus Data kategori Berhasil');
        } else {
            $this->session->set_flashdata('result', 'Hapus Data kategori Gagal');
        }
        // print_r($delete);
        // die;
        redirect('kategoriclient/index2');
    }
}
?>