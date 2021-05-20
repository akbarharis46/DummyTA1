<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ProduksiClient extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('curl');


        // new method
        $this->API = base_url('produksi');
        $this->API1 = base_url('detailproduksi');
        $this->API2 = base_url('detailstockproduksi');
        

        // old method
        // $this->API = "http://localhost:8080/dummyTA/produksi";
        // $this->API1 = "http://localhost:8080/dummyTA/detailproduksi";
        // $this->API2 = "http://localhost:8080/dummyTA/detailstockproduksi";
    }

    public function index()
    {
        $data['detailstockproduksi'] = json_decode($this->curl->simple_get($this->API));
        $data['produksi'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "produksi";

        // var_dump($data['detailstockproduksi']);die;

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
      $this->load->view('staffproduksi/post/produksi', $data);
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
        redirect('produksiclient/indexproduksi');
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
        $this->load->view('staffproduksi/put/produksi', $data);
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
        redirect('produksiclient/indexproduksi');
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
    redirect('produksiclient/indexproduksi');
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



public function data_staffproduksikeluar()
{
  $params = array('id_produksi' =>  $this->uri->segment(3));
  $data['detailproduksi'] = json_decode($this->curl->simple_get($this->API2));
  $data['produksi'] = json_decode($this->curl->simple_get($this->API,$params));
  $data['title'] = "Edit Data pengiriman";
  $this->load->view('header1');
  $this->load->view('bar1');
  $this->load->view('staffproduksi/perpindahan_dataproduksi',$data);
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
    $id_produksi   = $this->input->post('id_produksi');
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

    $insert =   $this->curl->simple_post($this->API1,$data1);

    $data2 = array(
          'id_produksi'                  => $id_produksi,
          'nama_staff'                  => $this->input->post('nama_staff'),
          'shift'                        => $this->input->post('shift'),
          'tanggal'                         => $this->input->post('tanggal'),
          'jumlah_produksi'                         => $this->input->post('jumlah_produksi'),
          
          
      );

      
      $update =  $this->curl->simple_put($this->API, $data2, array(CURLOPT_BUFFERSIZE => 10));

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


public function prosesdata_staffproduksikeluar()
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
          redirect('detailproduksiclient/indexproduksi');
          
        } else {
            echo"gagal";
        }
      } else{
          redirect('detailproduksiclient/indexproduksi');
      }
  }






  // cetak pdf
  function exportToPDF() {

      // header attribute
      $name_file = 'PRODUKSI-'.rand(1, 999999).'-'.date('Y-m-d');
      $pdf = $this->header_attr( $name_file );

      // add a page
      $pdf->AddPage('P', 'A4');


      // Sub header
      // $pdf->Ln(5, false);
      $html = '<table border="0">
          <tr>
              <td align="center"><h2>LAPORAN DATA PRODUKSI</h2> <br> Lorepisum dolar sit amlet</td>
          
          </tr>
  
      
      </table>';

      $pdf->writeHTML($html, true, false, true, false, '');
      $pdf->Ln(5, false);

      
      

      // header table
      $table_body = "";
      $data['produksi'] = json_decode($this->curl->simple_get($this->API));
      
      if ( count( $data['produksi'] ) > 0 ) {

        $i = 1;
        foreach ( $data['produksi'] AS $item ) {

            $table_body .= '<tr>
            
                <td>'.$i.'</td>
                <td>'.$item->tanggal.'</td>
                <td>'.$item->nama_staff.'</td>
                <td>'.$item->shift.'</td>
                <td>'.$item->jumlah_produksi.'</td>
            
            </tr>';

            $i++;
        }
      }



      $table = '
          <table border="1" width="100%" cellpadding="6">
              <tr>
                  <th width="5%" height="20" padding="5" align="center"><b>No</b></th>
                  <th width="15%" align="center"><b>Tanggal</b></th>
                  <th width="30%" align="center"><b>Nama Staff</b></th>
                  <th width="20%" align="center"><b>Shift Produksi</b></th>
                  <th width="30%" align="center"><b>Hasil Produksi Hari ini</b></th>
          
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
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

    // ---------------------------------------------------------

    // set font
    $pdf->SetFont('times', '', 10);

    return $pdf;
}

}
?>