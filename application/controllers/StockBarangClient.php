<?php

defined('BASEPATH') or exit('No direct script access allowed');

class StockBarangClient extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('curl');
        
        $this->API = "http://localhost:8080/dummyTA/stockbarang";
        $this->API2 = "http://localhost:8080/dummyTA/kategori";
    }

    public function index()
    {
        $data['stockbarang'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "Stock Barang";
        $this->load->view('header0');
        $this->load->view('bar');
        $this->load->view('data/stock_barang', $data);
        $this->load->view('footer');
    }
    

    // public function index1()
    // {
    //     $data['barang'] = json_decode($this->curl->simple_get($this->API));
    //     $data['title'] = "barang";
    //     $this->load->view('header1');
    //     $this->load->view('bar1');
    //     $this->load->view('staffproduksi/barang', $data);
    //     $this->load->view('footer');
    // }

    // public function index2()
    // {
    //     $data['barang'] = json_decode($this->curl->simple_get($this->API));
    //     $data['title'] = "barang";
    //     $this->load->view('header1');
    //     $this->load->view('bar2');
    //     $this->load->view('staffgudang/barang', $data);
    //     $this->load->view('footer');
    // }


    // public function index3()
    // {
    //     $data['barang'] = json_decode($this->curl->simple_get($this->API));
    //     $data['title'] = "barang";
    //     $this->load->view('header1');
    //     $this->load->view('bar3');
    //     $this->load->view('staffpengiriman/barang', $data);
    //     $this->load->view('footer');
    // }




    public function post()
    {
     $data['stockbarang'] = json_decode($this->curl->simple_get($this->API));
     $data['kategori'] = json_decode($this->curl->simple_get($this->API2));

      $data['title'] = "Tambah Data Detai Produksi";
      $this->load->view('header0');
      $this->load->view('bar');
      $this->load->view('data/post/stock_barang', $data);
      $this->load->view('footer');
    }


    // public function postbarang()
    // {
    //  $this->API2 = "http://localhost:8080/dummyTA/kategori";
    //  $data['kategori'] = json_decode($this->curl->simple_get($this->API2));

    //   $data['title'] = "Tambah Data barang";
    //   $this->load->view('header1');
    //   $this->load->view('bar2');
    //   $this->load->view('staffgudang/postbarang', $data);
    //   $this->load->view('footer');
    // }

  
    public function post_process()
    {
        $data = array(

        
            'nama_barang'            => $this->input->post('nama_barang'),
            'tanggal_stockgudang'            => $this->input->post('tanggal_stockgudang'),
            'stock_pabrik'            => $this->input->post('stock_pabrik'),
         
        );
        $insert =  $this->curl->simple_post($this->API,$data);
        // print_r($data);
        // exit;

        if ($insert) {
            echo"berhasil";
            $this->session->set_flashdata('result', 'Data Kategori Berhasil Ditambahkan');
        } else {
            echo"gagal";
            $this->session->set_flashdata('result', 'Data Kategori Gagal Ditambahkan');
        }
        // print_r($data);
        // die;
        redirect('stockbarangclient');
      }



    //   public function post_processbarang()
    //   {
    //       $data = array(
    //           'nama_barang'            => $this->input->post('nama_barang'),
    //           'nama_kategori'           => $this->input->post('nama_kategori'),
    //           'total'                  => $this->input->post('total'),
    //           'tanggal'                  => $this->input->post('tanggal'),
       
    //       );
    //       $insert =  $this->curl->simple_post($this->API,$data);
    //       if ($insert) {
    //           // echo"berhasil";
    //           $this->session->set_flashdata('result', 'Data Kategori Berhasil Ditambahkan');
    //       } else {
    //           // echo"gagal berhasil";
    //           $this->session->set_flashdata('result', 'Data Kategori Gagal Ditambahkan');
    //       }
    //       // print_r($insert);
    //       // die;
    //       redirect('barangclient/index2');
    //     }



    
    public function put()
    {
        $params = array('id_detailsemuabarang' =>  $this->uri->segment(3));
        $data['stockbarang'] = json_decode($this->curl->simple_get($this->API, $params));
        $data['title'] = "Edit Data Barang";
        $this->load->view('header0');
        $this->load->view('bar');
        $this->load->view('data/put/stock_barang', $data);
        $this->load->view('footer');

    }


    // public function putbarang()
    // {
    //     $params = array('id_barang' =>  $this->uri->segment(3));
    //     $data['barang'] = json_decode($this->curl->simple_get($this->API, $params));
    //     $data['title'] = "Edit Data Barang";
    //     $this->load->view('header1');
    //     $this->load->view('bar2');
    //     $this->load->view('staffgudang/putbarang', $data);
    //     $this->load->view('footer');

    // }


    public function put_process()
    {
        $data = array(
            
            'id_detailsemuabarang'            => $this->input->post('id_detailsemuabarang'),
            'id_barang'            => $this->input->post('id_barang'),
            'tanggal_stockgudang'            => $this->input->post('tanggal_stockgudang'),
            'nama_barang'            => $this->input->post('nama_barang'),
            'stock_pabrik'            => $this->input->post('stock_pabrik'),
            
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
        redirect('stockbarangclient');
    }



    // public function put_processbarang()
    // {
    //     $data = array(
            
    //         'id_barang'            => $this->input->post('id_barang'),
    //         'nama_barang'            => $this->input->post('nama_barang'),
    //         'nama_kategori'           => $this->input->post('nama_kategori'),
    //         'total'                  => $this->input->post('total'),
    //         'tanggal'                  => $this->input->post('tanggal'),
    //     );
        
    //     $update =  $this->curl->simple_put($this->API, $data, array(CURLOPT_BUFFERSIZE => 10));
    //     if ($update) {
    //         echo"berhasil";
    //         // $this->session->set_flashdata('result', 'Update Data kategori Berhasil');
    //     } else {
    //         echo"gagal";
    //         // $this->session->set_flashdata('result', 'Update Data kategori Gagal');
    //     }
    //     // print_r($update);
    //     // die;
    //     redirect('barangclient/index2');
    // }






    public function delete()
    {
        $params = array('id_detailsemuabarang' =>  $this->uri->segment(3));
        $delete =  $this->curl->simple_delete($this->API, $params);
        if ($delete) {
            $this->session->set_flashdata('result', 'Hapus Data kategori Berhasil');
        } else {
            $this->session->set_flashdata('result', 'Hapus Data kategori Gagal');
        }
        // print_r($delete);
        // die;
        redirect('stockbarangclient');
    }



//     public function deletebarang()
//     {
//         $params = array('id_barang' =>  $this->uri->segment(3));
//         $delete =  $this->curl->simple_delete($this->API, $params);
//         if ($delete) {
//             $this->session->set_flashdata('result', 'Hapus Data kategori Berhasil');
//         } else {
//             $this->session->set_flashdata('result', 'Hapus Data kategori Gagal');
//         }
//         // print_r($delete);
//         // die;
//         redirect('barangclient/index2');
//     }

}

?>