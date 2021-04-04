<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ProduksiClient extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('curl');
        
        $this->API = "http://localhost:8080/dummyTA/produksi";
    }

    public function index()
    {
        $data['produksi'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "produksi";
        $this->load->view('header0');
        $this->load->view('bar');
        $this->load->view('data/produksi', $data);
        $this->load->view('footer');
    }
    public function index1()
    {
        $data['produksi'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "produksi";
        $this->load->view('header1');
        $this->load->view('bar1');
        $this->load->view('staffproduksi/produksi', $data);
        $this->load->view('footer');
    }

    public function index2()
    {
        $data['produksi'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "produksi";
        $this->load->view('header1');
        $this->load->view('bar2');
        $this->load->view('staffgudang/produksi', $data);
        $this->load->view('footer');
    }


    public function index3()
    {
        $data['produksi'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "produksi";
        $this->load->view('header1');
        $this->load->view('bar3');
        $this->load->view('staffpengiriman/produksi', $data);
        $this->load->view('footer');
    }





    public function post()
    {
      $data['title'] = "Tambah Data produksi";
      $this->load->view('header0');
      $this->load->view('bar');
      $this->load->view('data/post/produksi', $data);
      $this->load->view('footer');
    }


    public function postproduksi()
    {
      $data['title'] = "Tambah Data produksi";
      $this->load->view('header1');
      $this->load->view('bar1');
      $this->load->view('staffproduksi/post', $data);
      $this->load->view('footer');
    }
  
    public function post_process()
    {
        $data = array(
            'nama_staff'              => $this->input->post('nama_staff'),
            'shift'                   => $this->input->post('shift'),
            'jumlah_produksi'         => $this->input->post('jumlah_produksi'),
            'tanggal'                 => $this->input->post('tanggal'),
        );
        $insert =  $this->curl->simple_post($this->API,$data);
        if ($insert) {
            echo"berhasil";
        } else {
            echo"gagal ";
        }
        redirect('produksiclient');
      }


      
    public function post_processproduksi()
    {
        $data = array(
            'nama_staff'              => $this->input->post('nama_staff'),
            'shift'                   => $this->input->post('shift'),
            'jumlah_produksi'         => $this->input->post('jumlah_produksi'),
            'tanggal'                 => $this->input->post('tanggal'),
        );
        $insert =  $this->curl->simple_post($this->API,$data);
        if ($insert) {
            echo"berhasil";
        } else {
            echo"gagal ";
        }
        redirect('produksiclient/index1');
      }
    






    public function put()
    {
        $params = array('id_produksi' =>  $this->uri->segment(3));
        $data['produksi'] = json_decode($this->curl->simple_get($this->API, $params));
        $data['title'] = "Edit Data produksi";
        $this->load->view('header0');
        $this->load->view('bar');
        $this->load->view('data/put/produksi', $data);
        $this->load->view('footer');

    }

    public function putproduksi()
    {
        $params = array('id_produksi' =>  $this->uri->segment(3));
        $data['produksi'] = json_decode($this->curl->simple_get($this->API, $params));
        $data['title'] = "Edit Data produksi";
        $this->load->view('header1');
        $this->load->view('bar1');
        $this->load->view('staffproduksi/put', $data);
        $this->load->view('footer');

    }




    public function put_process()
    {
        $data = array(
            'id_produksi'                  => $this->input->post('id_produksi'),
            'nama_staff'              => $this->input->post('nama_staff'),
            'shift'                   => $this->input->post('shift'),
            'jumlah_produksi'         => $this->input->post('jumlah_produksi'),
            'tanggal'                 => $this->input->post('tanggal'),
            
            
        );
        
        $update =  $this->curl->simple_put($this->API, $data, array(CURLOPT_BUFFERSIZE => 10));
        if ($update) {
            echo"berhasil";
            // $this->session->set_flashdata('result', 'Update Data produksi Berhasil');
        } else {
            echo"gagal";
            // $this->session->set_flashdata('result', 'Update Data produksi Gagal');
        }
        // print_r($update);
        // die;
        redirect('produksiclient');
    }



    public function put_processproduksi()
    {
        $data = array(
            'id_produksi'                  => $this->input->post('id_produksi'),
            'nama_staff'              => $this->input->post('nama_staff'),
            'shift'                   => $this->input->post('shift'),
            'jumlah_produksi'         => $this->input->post('jumlah_produksi'),
            'tanggal'                 => $this->input->post('tanggal'),
            
            
        );
        
        $update =  $this->curl->simple_put($this->API, $data, array(CURLOPT_BUFFERSIZE => 10));
        if ($update) {
            echo"berhasil";
            // $this->session->set_flashdata('result', 'Update Data produksi Berhasil');
        } else {
            echo"gagal";
            // $this->session->set_flashdata('result', 'Update Data produksi Gagal');
        }
        // print_r($update);
        // die;
        redirect('produksiclient/index1');
    }


    public function delete()
    {
        $params = array('id_produksi' =>  $this->uri->segment(3));
        $delete =  $this->curl->simple_delete($this->API, $params);
        if ($delete) {
            $this->session->set_flashdata('result', 'Hapus Data produksi Berhasil');
        } else {
            $this->session->set_flashdata('result', 'Hapus Data produksi Gagal');
        }
        // print_r($delete);
        // die;
        redirect('produksiclient');
    }


public function deleteproduksi()
{
    $params = array('id_produksi' =>  $this->uri->segment(3));
    $delete =  $this->curl->simple_delete($this->API, $params);
    if ($delete) {
        $this->session->set_flashdata('result', 'Hapus Data produksi Berhasil');
    } else {
        $this->session->set_flashdata('result', 'Hapus Data produksi Gagal');
    }
    // print_r($delete);
    // die;
    redirect('produksiclient/index1');
}










}
?>