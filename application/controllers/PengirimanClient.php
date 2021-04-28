<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PengirimanClient extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('curl');
        $this->load->model('admin_model');
        
        $this->API = "http://localhost:8080/dummyTA/pengiriman";
        $this->API1 = "http://localhost:8080/dummyTA/detail";
        $this->API2 = "http://localhost:8080/dummyTA/detailstockproduksi";
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


    public function indexproduksi()
    {
        $data['pengiriman'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "pengiriman";
        $this->load->view('header1');
        $this->load->view('bar1');
        $this->load->view('staffproduksi/pengiriman', $data);
        $this->load->view('footer');
    }

    public function indexgudang()
    {
        $data['pengiriman'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "pengiriman";
        $this->load->view('header1');
        $this->load->view('bar2');
        $this->load->view('staffgudang/pengiriman', $data);
        $this->load->view('footer');
    }


    public function indexstaffpengiriman()
    {
        $data['pengiriman'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "pengiriman";
        $this->load->view('header1');
        $this->load->view('bar3');
        $this->load->view('staffpengiriman/pengiriman', $data);
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

  
    public function postpengiriman()
    {
      $data['title'] = "Tambah Data pengiriman";
      $this->load->view('header1');
      $this->load->view('bar3');
      $this->load->view('staffpengiriman/post/pengiriman', $data);
      $this->load->view('footer');
    }
  


    public function post_process()
    {
        $data = array(
            'nama_pengirim'                  => $this->input->post('nama_pengirim'),
            'nomorhp'                  => $this->input->post('nomorhp'),
            'tujuan'                         => $this->input->post('tujuan'),
            'jumlah'                         => $this->input->post('jumlah'),
            'jenis_kendaraan'                => $this->input->post('jenis_kendaraan'),
            'nomor_kendaraan'                => $this->input->post('nomor_kendaraan'),
            'tanggal'                        => $this->input->post('tanggal'),
            
            'status_pengiriman'              => $this->input->post('status_pengiriman'),     
        );
        $insert =  $this->curl->simple_post($this->API,$data);

        // Kurangi stok
      $detail_produksi = json_decode($this->curl->simple_get($this->API2), true);


      $data2 = array(
        'id_detailstockproduksi' => $detail_produksi[0]['id_detailstockproduksi'],
        'tanggal_stockproduksi' => date('Y-m-d'),
        'stock_produksi' => $detail_produksi[0]['stock_produksi'] - $this->input->post('jumlah')
        
      );
      
      $update = $this->curl->simple_put($this->API2, $data2, array(CURLOPT_BUFFERSIZE => 10));

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



      public function post_processpengiriman()
      {
          $data = array(
              'nama_pengirim'                  => $this->input->post('nama_pengirim'),
              'nomorhp'                         => $this->input->post('nomorhp'),
              'tujuan'                         => $this->input->post('tujuan'),
              'jumlah'                         => $this->input->post('jumlah'),
              'jenis_kendaraan'                => $this->input->post('jenis_kendaraan'),
              'nomor_kendaraan'                => $this->input->post('nomor_kendaraan'),
              'tanggal'                        => $this->input->post('tanggal'),
              'status_pengiriman'              => $this->input->post('status_pengiriman'),     
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
          redirect('pengirimanclient/indexstaffpengiriman');
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

        public function putpengiriman()
        {
            $params = array('id_pengiriman' =>  $this->uri->segment(3));
            $data['pengiriman'] = json_decode($this->curl->simple_get($this->API, $params));
            $data['title'] = "Edit Data pengiriman";
            $this->load->view('header1');
            $this->load->view('bar3');
            $this->load->view('staffpengiriman/put/pengiriman', $data);
            $this->load->view('footer');
       
        }



    public function put_process()
    {
        $data = array(
            'id_pengiriman'                  => $this->input->post('id_pengiriman'),
            'nama_pengirim'                  => $this->input->post('nama_pengirim'),
            'nomorhp'                        => $this->input->post('nomorhp'),
            'tujuan'                         => $this->input->post('tujuan'),
            'jumlah'                         => $this->input->post('jumlah'),
            'jenis_kendaraan'                => $this->input->post('jenis_kendaraan'),
            'nomor_kendaraan'                => $this->input->post('nomor_kendaraan'),
            'tanggal'                        => $this->input->post('tanggal'),
            'status_pengiriman'              => $this->input->post('status_pengiriman'),
            
            
        );

        
        $update =  $this->curl->simple_put($this->API, $data, array(CURLOPT_BUFFERSIZE => 10));

        // Kurangi stok
        $detail_produksi = json_decode($this->curl->simple_get($this->API2), true);


        $data2 = array(
            'id_detailstockproduksi' => $detail_produksi[0]['id_detailstockproduksi'],
            'tanggal_stockproduksi' => date('Y-m-d'),
            'stock_produksi' => $detail_produksi[0]['stock_produksi'] - ($this->input->post('jumlah') - $this->input->post('jumlah_lama'))
            
        );

        $update = $this->curl->simple_put($this->API2, $data2, array(CURLOPT_BUFFERSIZE => 10));

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




    
    public function put_processpengiriman()
    {
        $data = array(
            'id_pengiriman'                  => $this->input->post('id_pengiriman'),
            'nama_pengirim'                  => $this->input->post('nama_pengirim'),
            'nomorhp'                        => $this->input->post('nomorhp'),
            'tujuan'                         => $this->input->post('tujuan'),
            'jumlah'                         => $this->input->post('jumlah'),
            'jenis_kendaraan'                => $this->input->post('jenis_kendaraan'),
            'nomor_kendaraan'                => $this->input->post('nomor_kendaraan'),
            'tanggal'                        => $this->input->post('tanggal'),
            'status_pengiriman'              => $this->input->post('status_pengiriman'),
            
            
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
        redirect('pengirimanclient/indexstaffpengiriman');


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

    
    public function deletepengiriman()
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
        redirect('pengirimanclient/indexstaffpengiriman');
    }


    public function barang_keluar()
  {
    $uri = array('id_pengiriman' =>  $this->uri->segment(3));
    $data['pengiriman'] = json_decode($this->curl->simple_get($this->API,$uri));
    $data['detail'] = json_decode($this->curl->simple_get($this->API1));
    $data['title'] = "Edit Data pengiriman";
    $this->load->view('header0');
    $this->load->view('bar');
    $this->load->view('data/perpindahan_barang',$data);
    $this->load->view('footer');
  }

  public function barangkeluar_staffpengiriman()
  {
    $uri = array('id_pengiriman' =>  $this->uri->segment(3));
    $data['pengiriman'] = json_decode($this->curl->simple_get($this->API,$uri));
    $data['detail'] = json_decode($this->curl->simple_get($this->API1));
    $data['title'] = "Edit Data pengiriman";
    $this->load->view('header1');
    $this->load->view('bar3');
    $this->load->view('staffpengiriman/perpindahan_barang',$data);
    $this->load->view('footer');
  }



  public function proses_data_keluar()
  {
    $this->load->model('admin_model');
    $this->db->set("jumlah_pengiriman","jumlah_pengiriman - jumlah_pengiriman");
    $this->db->where('id_pengiriman', 'id_pengiriman');
    $this->form_validation->set_rules('tanggal_diterima','Tanggal Diterima','trim|required');
    // $this->form_validation->set_rules('jumlah_pengiriman-jumlah_pengiriman','Jumlah Pengiriman','trim|required');
    if($this->form_validation->run() === true)
    {
      $id_pengiriman   = $this->input->post('id_pengiriman');
      $namapengirim   = $this->input->post('nama_pengirim');
      $no_hp    = $this->input->post('nomorhp');
      $jeniskendaraan         = $this->input->post('jenis_kendaraan');
      $tujuan_pengiriman         = $this->input->post('tujuan');
      $no_kendaraan         = $this->input->post('nomor_kendaraan');
      $status         = $this->input->post('status_pengiriman');
      $jumlah_pengiriman    = $this->input->post('jumlah');
      $tanggal_masuk         = $this->input->post('tanggal');
      $tanggal_diterima         = $this->input->post('tanggal_diterima');

      

      $data1 = array(
              'id_pengiriman' => $id_pengiriman,
              'namapengirim' =>$namapengirim,
              'no_hp' =>$no_hp,
              'jeniskendaraan' =>$jeniskendaraan,         
              'tujuan_pengiriman' =>$tujuan_pengiriman,        
              'no_kendaraan' =>$no_kendaraan,         
              'status' =>$status,         
              'jumlah_pengiriman' => $jumlah_pengiriman,
              'tanggal_masuk' => $tanggal_masuk,
              'tanggal_diterima' => $tanggal_diterima
      );
      $insert =   $this->curl->simple_post($this->API1,$data1);

      $data = array(
            'id_pengiriman'                  => $this->input->post('id_pengiriman'),
            'nama_pengirim'                  => $this->input->post('nama_pengirim'),
            'nomorhp'                        => $this->input->post('nomorhp'),
            'tujuan'                         => $this->input->post('tujuan'),
            'jumlah'                         => $this->input->post('jumlah'),
            'jenis_kendaraan'                => $this->input->post('jenis_kendaraan'),
            'nomor_kendaraan'                => $this->input->post('nomor_kendaraan'),
            'tanggal'                        => $this->input->post('tanggal'),
            'status_pengiriman'              => $this->input->post('status_pengiriman'),
            
            
        );
        
        $update =  $this->curl->simple_put($this->API, $data, array(CURLOPT_BUFFERSIZE => 10));

      

    //   var_dump($insert);
    //   exit;
         if($insert){
             echo"berhasil";   
            redirect('detailclient');

            } else {
                echo"gagal";
            }
        } else{
            redirect('detailclient');
        }
    }


    public function proses_data_keluarstaffpengiriman()
    {
      $this->load->model('admin_model');
      $this->db->set("jumlah_pengiriman","jumlah_pengiriman - jumlah_pengiriman");
      $this->db->where('id_pengiriman', 'id_pengiriman');
      $this->form_validation->set_rules('tanggal_diterima','Tanggal Diterima','trim|required');
      // $this->form_validation->set_rules('jumlah_pengiriman-jumlah_pengiriman','Jumlah Pengiriman','trim|required');
      if($this->form_validation->run() === true)
      {
        $id_pengiriman   = $this->input->post('id_pengiriman');
        $namapengirim   = $this->input->post('nama_pengirim');
        $no_hp    = $this->input->post('nomorhp');
        $jeniskendaraan         = $this->input->post('jenis_kendaraan');
        $tujuan_pengiriman         = $this->input->post('tujuan');
        $no_kendaraan         = $this->input->post('nomor_kendaraan');
        $status         = $this->input->post('status_pengiriman');
        $jumlah_pengiriman    = $this->input->post('jumlah');
        $tanggal_masuk         = $this->input->post('tanggal');
        $tanggal_diterima         = $this->input->post('tanggal_diterima');
  
        
  
        $data1 = array(
                'id_pengiriman' => $id_pengiriman,
                'namapengirim' =>$namapengirim,
                'no_hp' =>$no_hp,
                'jeniskendaraan' =>$jeniskendaraan,         
                'tujuan_pengiriman' =>$tujuan_pengiriman,        
                'no_kendaraan' =>$no_kendaraan,         
                'status' =>$status,         
                'jumlah_pengiriman' => $jumlah_pengiriman,
                'tanggal_masuk' => $tanggal_masuk,
                'tanggal_diterima' => $tanggal_diterima
        );
        $insert =   $this->curl->simple_post($this->API1,$data1);
  
        $data = array(
              'id_pengiriman'                  => $this->input->post('id_pengiriman'),
              'nama_pengirim'                  => $this->input->post('nama_pengirim'),
              'nomorhp'                        => $this->input->post('nomorhp'),
              'tujuan'                         => $this->input->post('tujuan'),
              'jumlah'                         => $this->input->post('jumlah'),
              'jenis_kendaraan'                => $this->input->post('jenis_kendaraan'),
              'nomor_kendaraan'                => $this->input->post('nomor_kendaraan'),
              'tanggal'                        => $this->input->post('tanggal'),
              'status_pengiriman'              => $this->input->post('status_pengiriman'),
              
              
          );
          
          $update =  $this->curl->simple_put($this->API, $data, array(CURLOPT_BUFFERSIZE => 10));
  
        
  
      //   var_dump($insert);
      //   exit;
           if($insert){
               echo"berhasil";   
              redirect('detailclient/indexpengiriman');
  
              } else {
                  echo"gagal";
              }
          } else{
              redirect('detailclient/indexpengiriman');
          }
      }


}



?>