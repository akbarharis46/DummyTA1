<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ProduksiClient extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('curl');
        
        $this->API = "http://localhost:8080/dummyTA/produksi";
        $this->API2 = "http://localhost:8080/dummyTA/detailproduksi";
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
    public function indexproduksi()
    {
        $data['produksi'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "produksi";
        $this->load->view('header1');
        $this->load->view('bar1');
        $this->load->view('staffproduksi/produksi', $data);
        $this->load->view('footer');
    }

    public function indexgudang()
    {
        $data['produksi'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "produksi";
        $this->load->view('header1');
        $this->load->view('bar2');
        $this->load->view('staffgudang/produksi', $data);
        $this->load->view('footer');
    }


    public function indexpengiriman()
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
      $this->load->view('staffproduksi/hasil_produksip', $data);
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
        
        // update stok barang
        $detail_produksi = json_decode($this->curl->simple_get($this->API2), true);


        $data2 = array(
            'id_detailstockproduksi' => $detail_produksi[0]['id_detailstockproduksi'],
            'tanggal_stockproduksi' => date('Y-m-d'),
            'stock_produksi' => $detail_produksi[0]['stock_produksi'] + $this->input->post('jumlah_produksi')
            
        );

        $update = $this->curl->simple_put($this->API2, $data2, array(CURLOPT_BUFFERSIZE => 10));

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
        $this->load->view('staffproduksi/hasil_produksiput', $data);
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

          // update stok barang
          $detail_produksi = json_decode($this->curl->simple_get($this->API2), true);


          $data2 = array(
              'id_detailstockproduksi' => $detail_produksi[0]['id_detailstockproduksi'],
              'tanggal_stockproduksi' => date('Y-m-d'),
              'stock_produksi' => $detail_produksi[0]['stock_produksi'] + ($this->input->post('jumlah_produksi') - $this->input->post('jumlah_produksi_lama'))
              
          );
  
          $update = $this->curl->simple_put($this->API2, $data2, array(CURLOPT_BUFFERSIZE => 10));

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

public function data_produksikeluar()
{
  $params = array('id_produksi' =>  $this->uri->segment(3));
  $data['detailproduksi'] = json_decode($this->curl->simple_get($this->API2));
  $data['produksi'] = json_decode($this->curl->simple_get($this->API,$params));
  $data['title'] = "Edit Data pengiriman";
  $this->load->view('header0');
  $this->load->view('bar');
  $this->load->view('data/perpindahan_dataproduksi',$data);
  $this->load->view('footer');
}

public function prosesdata_produksikeluar()
{
  $this->load->model('admin_model');
  $this->db->where('id_produksi', 'id_produksi');
  $this->form_validation->set_rules('tanggal','Tanggal Diterima','trim|required');



  // $this->form_validation->set_rules('jumlah_pengiriman-jumlah_pengiriman','Jumlah Pengiriman','trim|required');
  if($this->form_validation->run() === true)
  {
    $id_produksi   = $this->input->post('id_produksii');
    $nama_staff   = $this->input->post('nama_staff');
    $shift    = $this->input->post('shift');
    $tanggal         = $this->input->post('tanggal');
    $jumlah_produksi         = $this->input->post('jumlah_produksi');

    $data1 = array(
            'id_produksi' => $id_produksi,
            'nama_staff' =>$nama_staff,
            'shift' =>$shift,
            'tanggal' =>$tanggal,         
            'jumlah_produksi' =>$jumlah_produksi,         
            
    );
    $insert =   $this->curl->simple_post($this->API2,$data1);

    $data = array(
          'id_produksi'                  => $this->input->post('id_produksi'),
          'nama_staff'                  => $this->input->post('nama_staff'),
          'shift'                        => $this->input->post('shift'),
          'tanggal'                         => $this->input->post('tanggal'),
          'jumlah_produksi'                         => $this->input->post('jumlah_produksi'),
          
          
      );
      
      $update =  $this->curl->simple_put($this->API, $data, array(CURLOPT_BUFFERSIZE => 10));

      if($insert){
        //   print_r($update);
        //   exit;
          echo"berhasil";   
          redirect('detailproduksiclient');
          
        } else {
            echo"gagal";
        }
      } else{
          redirect('detailproduksiclient');
      }
  }

}
?>