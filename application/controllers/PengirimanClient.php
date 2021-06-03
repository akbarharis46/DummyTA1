<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PengirimanClient extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('curl');
        $this->load->model('admin_model');


        $this->API = base_url('pengiriman');
        $this->API1 = base_url('detail');
        $this->API2 = base_url('detailstockproduksi');
        
        // $this->API = "http://localhost:8080/dummyTA/pengiriman";
        // $this->API1 = "http://localhost:8080/dummyTA/detail";
        // $this->API2 = "http://localhost:8080/dummyTA/detailstockproduksi";
    }

    public function index()
    {
        $data['pengiriman'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "pengiriman";
        $this->load->view('header0');
        $this->load->view('data/pengiriman', $data);
        $this->load->view('baradmin');
        $this->load->view('footer');
    }


    public function indexproduksi()
    {
        $data['pengiriman'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "pengiriman";
        $this->load->view('header1');
        $this->load->view('staffproduksi/pengiriman', $data);
        $this->load->view('barproduksi');
        $this->load->view('footer');
    }

    public function indexgudang()
    {
        $data['pengiriman'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "pengiriman";
        $this->load->view('header1');
        $this->load->view('staffgudang/pengiriman', $data);
        $this->load->view('bargudang');
        $this->load->view('footer');
    }


    public function indexstaffpengiriman()
    {
        $data['pengiriman'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "pengiriman";
        $this->load->view('header1');
        $this->load->view('staffpengiriman/pengiriman', $data);
        $this->load->view('barpengiriman');
        $this->load->view('footer');
    }


    
    public function post()
    {
      $data['title'] = "Tambah Data pengiriman";
      $data['detailstockproduksi'] = json_decode($this->curl->simple_get($this->API2));
      $this->load->view('header0');
      $this->load->view('data/post/pengiriman', $data);
      $this->load->view('baradmin');
      $this->load->view('footer');
    }

  
    public function postpengiriman()
    {
      $data['title'] = "Tambah Data pengiriman";
      $this->load->view('header1');
      $this->load->view('barpengiriman');
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
          redirect('pengirimanclient/indexstaffpengiriman');
        }
    


    public function put()
    {
        $params = array('id_pengiriman' =>  $this->uri->segment(3));
        $data['pengiriman'] = json_decode($this->curl->simple_get($this->API, $params));
        $data['title'] = "Edit Data pengiriman";
        $this->load->view('header0');
        $this->load->view('baradmin');
        $this->load->view('data/put/pengiriman', $data);
        $this->load->view('footer');

    }

        public function putpengiriman()
        {
            $params = array('id_pengiriman' =>  $this->uri->segment(3));
            $data['pengiriman'] = json_decode($this->curl->simple_get($this->API, $params));
            $data['title'] = "Edit Data pengiriman";
            $this->load->view('header1');
            $this->load->view('barpengiriman');
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
    $this->load->view('baradmin');
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
    $this->load->view('barpengiriman');
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







 // cetak pdf
  function exportToPDF() {



    // header attribute
    $name_file = 'Data Pengiriman-'.rand(1, 999999).'-'.date('Y-m-d');
    
    $tanggal_interval = $this->input->get('interval-tanggal');
      
    // apakah user melakuan filter ?
    if ( $tanggal_interval ) {

      $pisah_waktu = explode('-', $tanggal_interval);

      $tanggal_awal = strtotime($pisah_waktu[0]);
      $tanggal_akhir= strtotime($pisah_waktu[1]);
    }
    
    $pdf = $this->header_attr( $name_file );

    // add a page
    $pdf->AddPage('L', 'A4');


    // Sub header
    // $pdf->Ln(5, false);
    $html = '<table border="0">
        <tr>
            <td align="center"><h2>LAPORAN PENGIRIMAN</h2> <br> Lorepisum dolar sit amlet</td>
        
        </tr>

    
    </table>';

    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Ln(5, false);

    
    

    // header table
    $table_body = "";
    $data['pengiriman'] = json_decode($this->curl->simple_get($this->API));
    
    $data_pengiriman = array();

    // pre-processing
    if ( count($data['pengiriman']) > 0 ) {

        foreach ( $data['pengiriman'] AS $item ) {

            $tanggal_pengiriman = strtotime( $item->tanggal );


            // user melakukan filter
            if ( !empty( $tanggal_interval ) ) {

                if ( $tanggal_pengiriman == $tanggal_awal && $tanggal_pengiriman == $tanggal_akhir ) { 

                    array_push( $data_pengiriman, $item );
                } else if ( $tanggal_pengiriman >= $tanggal_awal && $tanggal_pengiriman <= $tanggal_akhir ) {
    
                    array_push( $data_pengiriman, $item );
                }

            } else { 

                array_push( $data_pengiriman, $item );
            }
        }
    }


    if ( count( $data_pengiriman ) > 0 ) {

      $i = 1;
      foreach ( $data_pengiriman AS $item ) {

          $table_body .= '<tr>
          
              <td>'.$i.'</td>
              <td>'.$item->nama_pengirim.'</td>
              <td>'.$item->nomorhp.'</td>
              <td>'.$item->tujuan.'</td>
              <td>'.$item->jumlah.'</td>
              <td>'.$item->jenis_kendaraan.'</td>
              <td>'.$item->nomor_kendaraan.'</td>
              <td>'.$item->tanggal.'</td>
              <td>'.$item->status_pengiriman.'</td>

          </tr>';

          $i++;
      }
    }



    $table = '
        <table border="1" width="100%" cellpadding="6">
            <tr>
                <th width="5%" height="20" padding="5" align="center"><b>No</b></th>
                <th width="20%" align="center"><b>Nama Pengirim</b></th>
                <th width="10%" align="center"><b>Nomor Hp Petugas</b></th>
                <th width="10%" align="center"><b>Tujuan Pengiriman</b></th>
                <th width="10%" align="center"><b>Jumlah</b></th>
                <th width="15%" align="center"><b>Jenis Kendaraan</b></th>
                <th width="10%" align="center"><b>Nomor Kendaraan</b></th>
                <th width="10%" align="center"><b>Tanggal Pengiriman</b></th>
                <th width="10%" align="center"><b>Status Pengiriman</b></th>
                
        
            </tr>
            '.$table_body.'
        </table>';

    $pdf->writeHTML($table, true, false, true, false, '');



    $pdf->Ln(10, false);
    $ttd = '
        <table border="0">
            <tr>
                <td colspan="2" align="right">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.date('Y').'</td>
            </tr>
            <tr>
                <td colspan="2" height="80"></td>
            </tr>
            <tr>
                <td width="75%"></td>
                <td width="20%" align="center">(. . . . . . . . . . . . . . . . .)</td>
            </tr>
        </table>
    ';

    $pdf->writeHTML($ttd, true, false, true, false, '');


    // output
    $pdf->Output($name_file.'.pdf', 'I');
}




// cetak pdf
function exportsuratjalan( $id_pengiriman ) {

    // header attribute
    $name_file = 'PENGIRIMAN BARANG-'.rand(1, 999999).'-'.date('Y-m-d');
    $pdf = $this->header_attr( $name_file );

    // add a page
    $pdf->AddPage('L', 'A4');


    // Sub header
    // $pdf->Ln(5, false);
    $html = '<table border="0">
        <tr>
            <td align="center"><h2>SURAT JALAN PENGIRIMAN</h2> <br> Lorepisum dolar sit amlet</td>
        
        </tr>

    
    </table>';

    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Ln(5, false);

    
    

    // header table
    $table_body = "";
    $data['pengiriman'] = json_decode($this->curl->simple_get($this->API));

    $params = array('id_pengiriman' =>  $id_pengiriman);
    $data['pengiriman'] = json_decode($this->curl->simple_get($this->API, $params));
   
    if ( count( $data['pengiriman'] ) > 0 ) {

        $i = 1;
        foreach ( $data['pengiriman'] AS $item ) {

          $table_body .= '<tr>
          
              <td>'.$i.'</td>
              <td>'.$item->nama_pengirim.'</td>
              <td>'.$item->nomorhp.'</td>
              <td>'.$item->tujuan.'</td>
              <td>'.$item->jumlah.'</td>
              <td>'.$item->jenis_kendaraan.'</td>
              <td>'.$item->nomor_kendaraan.'</td>
              <td>'.$item->tanggal.'</td>
              <td>'.$item->status_pengiriman.'</td>

          </tr>';

          $i++;
      }
    }



    $table = '
        <table border="1" width="100%" cellpadding="6">
            <tr>
                <th width="5%" height="20" padding="5" align="center"><b>No</b></th>
                <th width="20%" align="center"><b>Nama Pengirim</b></th>
                <th width="10%" align="center"><b>Nomor Hp Petugas</b></th>
                <th width="10%" align="center"><b>Tujuan Pengiriman</b></th>
                <th width="10%" align="center"><b>Jumlah</b></th>
                <th width="15%" align="center"><b>Jenis Kendaraan</b></th>
                <th width="10%" align="center"><b>Nomor Kendaraan</b></th>
                <th width="10%" align="center"><b>Tanggal Pengiriman</b></th>
                <th width="10%" align="center"><b>Status Pengiriman</b></th>
                
        
            </tr>
            '.$table_body.'
        </table>';

    $pdf->writeHTML($table, true, false, true, false, '');



    $pdf->Ln(10, false);
    $ttd = '
        <table border="0">
            <tr>
                <td colspan="2" align="right">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.date('Y').'</td>
            </tr>
            <tr>
                <td colspan="2" height="80"></td>
            </tr>
            <tr>
                <td width="75%"></td>
                <td width="20%" align="center">(. . . . . . . . . . . . . . . . .)</td>
            </tr>
        </table>
    ';

    $pdf->writeHTML($ttd, true, false, true, false, '');


    // output
    $pdf->Output($name_file.'.pdf', 'I');
}




// header attr
function header_attr( $title ) {

    // create new PDF document
    $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Dwi Nur Cahyo');
    $pdf->SetTitle($title);
    // $pdf->SetSubject('TCPDF Tutorial');
    // $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, 35, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
    if (@file_exists(dirname(_FILE_).'/lang/eng.php')) {
        require_once(dirname(_FILE_).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

    // ---------------------------------------------------------

    // set font
    $pdf->SetFont('times', '', 10);

    return $pdf;
}



}



?>