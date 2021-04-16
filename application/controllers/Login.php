<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('curl');
    $this->load->library('session');
    $this->load->model('login_model');
  }

  public function index()
  {
    $data['title'] = 'login';
    $this->load->view('login/index', $data);
  }


  public function log_process()
  {
    $user = $this->input->post('user');
    $password = $this->input->post('password');
    $check = $this->login_model->login($user, $password);
    if ($check) {
      foreach ($check as $rows) {
        $this->session->set_userdata('id', $rows->id);
        $this->session->set_userdata('username', $rows->username);
        $this->session->set_userdata('level', $rows->level);

        // redirect('userclient');
      }
      // print_r($check);
      // exit;
      if ($this->session->userdata('level') == "admin") {
        redirect('adminclient');
      } elseif ($this->session->userdata('level') == "Staff Produksi") {
        redirect('staffproduksiclient');
      } elseif ($this->session->userdata('level') == "Staff Gudang") {
        redirect('staffgudangclient');
      } elseif ($this->session->userdata('level') == "Staff Pengiriman") {
        redirect('staffpengirimanclient');
      } else {
        return false;
      }
    } else {
      $this->session->set_flashdata('result', 'Login gagal');
      redirect('login');
    }
  }
    





  public function reg()
  {
    $data['title'] = 'registrasi';
    $this->load->view('header1', $data, FALSE);
    $this->load->view('login/registrasi', $data, FALSE);
    $this->load->view('footer', $data, FALSE);
  }

  public function reg_process()
  {
    $this->API = "http://localhost:8080/antrian/user";
    $data = array(
      'uid_sosmed'          => $this->input->post('uid_sosmed'),
      'username'         => $this->input->post('username'),
      'email'          => $this->input->post('email'),
      'password'         => $this->input->post('password'),
      'status'          => $this->input->post('status'),
      'nama_user'          => $this->input->post('nama_user'),
      'telepom'          => $this->input->post('telepom'),
      'alamat'          => $this->input->post('alamat'),
      'tgl_lhr_user'          => $this->input->post('tgl_lhr_user'),
      'foto_user'          => $this->input->post('nama'),
      'id_kota'          => $this->input->post('nama'),
    );

    $update =  $this->curl->simple_post($this->API, $data, array(CURLOPT_BUFFERSIZE => 10));
    if ($update) {
      $this->session->set_flashdata('result', 'Regsitrasi Berhasil,please wait for verification');
    } else {
      $this->session->set_flashdata('result', 'Registrasi Gagal');
    }
    redirect('login', 'refresh');
  }
  public function out()
  {
    $this->session->sess_destroy();
    redirect('login', 'refresh');
  }
}









/* End of file Home.php */
?>